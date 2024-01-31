<?php

namespace Ideasoft\Jobs;

use Ideasoft\Constants\AppConstants;
use Ideasoft\Contracts\Services\CommunicationServiceInterface;
use Ideasoft\Enums\MessageStatus;
use Ideasoft\Helper\MessageCheckHelper;
use Ideasoft\Message;
use Ideasoft\Models\Authentication;
use Ideasoft\Models\Trigger;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MessageReceiver implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $connection = "ideasoft_queue";

    public $queue = "ideasoft_message_receiver";
    private $authenticationId;
    private $data;
    private $identifier;


    public function __construct($authenticationId, $data, $identifier)
    {
        $this->authenticationId = $authenticationId;
        $this->data = $data;
        $this->identifier = $identifier;
    }

    public function handle(CommunicationServiceInterface $communicationService): void
    {
        $message = new Message($this->data);
        $message->setStatus(MessageStatus::Received);
        /** @var Authentication|null $authenticationModel */
        $authenticationModel = Authentication::query()->find($this->authenticationId);
        if (!$authenticationModel) {
            /**
             * todo: burada webhook veya reader nereden geldiğine göre kayıt silinecek.
             */
            return;
        }
        $message->setAuthentication($authenticationModel);
        $message->setUserId($authenticationModel->user_id);
        //todo: burayı toparla credit objesi gelsin
        $checkCredit = $communicationService->checkCredit($authenticationModel->user_id);
        $message->setAvaibleCredit($checkCredit['credit']);
        //kredi bilgisi gelecek
        if ($checkCredit['credit'] <= 0) {
            $message->setStatus(MessageStatus::InsufficientFunds);
            return;
        }


        if (MessageCheckHelper::checkSelfTrigger($this->data, $authenticationModel->user_id)) {
            $message->setStatus(MessageStatus::SelfTriggeredMessage);
            return;
        }
        /** @var Trigger|null $triggerModel */
        $triggerModel = Trigger::query()->where('identifier', $this->identifier)->first();
        if (!$triggerModel) {
            $message->setStatus(MessageStatus::TriggerNotFound);
            return;
        }
        $message->setTrigger($triggerModel);
        //todo: client exceptionların yönetilmesi lazım
        $flow = $communicationService->findFlow(
            $authenticationModel->user_id,
            $authenticationModel->application_id,
            $triggerModel->id
        );
        if (!$flow) {
            $message->setStatus(MessageStatus::FlowNotFound);
            return;
        }
        $message->setFlowName($flow['name']);
        $message->setFlowId($flow['id']);
        $message->setFlowStatus($flow['status']);
        if (!$flow['status']) {
            $message->setStatus(MessageStatus::FlowPassiveStatus);
            return;
        }
        $message->setTriggerId($triggerModel->id);
        $message->setTriggerName($triggerModel->name);
        $message->setTriggerApplicationName(AppConstants::APP_NAME);
        $message->setTriggerApplicationId($authenticationModel->application_id);
        $message->check(); //todo: burada ne yapacağız
        $message->setStatus(MessageStatus::Checked);
        FlowResolver::dispatch($message);

        /**
         * 1- Mesaj benim başlattığım bir olay mı?
         *      Her olayın tanımlaması farklı olacaktır bu yüzden benim başlattığım mı değil mi bunu anlamak için
         *      tüm dataları uç uca ekleyerek hashle ve kullanıcı bilgisi ile kayıt ettikten sonra karşılaştır.
         * 2- Authenticationı var mı?
         * 3- Flowu var mı? - Bunu core ile iletişime geçebilecek job ile yaptım
         * 4- Kredisi var mı?
         */

        /**
         * Tüm bu şartları sağlıyorsa çözümleyiciye gönder
         * Çözümleyiciye bir obje olarak gitmeli
         *      Flow, authentication, user, trigger olarak.
         */

    }
}
