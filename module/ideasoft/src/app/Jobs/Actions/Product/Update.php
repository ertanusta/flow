<?php

namespace Ideasoft\Jobs\Actions\Product;

use Ideasoft\Contracts\Client\ClientInterface;
use Ideasoft\Contracts\Services\AuthenticationServiceInterface;
use Ideasoft\Contracts\Services\CommunicationServiceInterface;
use Ideasoft\Enums\MessageStatus;
use Ideasoft\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use RuleEngine\Facades\RuleEngine;

class Update implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Message $message;

    private $data = [
        "name" => null
    ];


    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function handle(
        ClientInterface                $client,
        AuthenticationServiceInterface $authenticationService,
        CommunicationServiceInterface  $communicationService
    )
    {
        try {
            $authentication = $authenticationService->refreshAccessToken($this->message->getAuthentication());
            $this->message->setStatus(MessageStatus::AuthenticationTokenRefreshed);
            //todo: burada bir hata gerçekleşebilir bu yüzden try catch e alınıp kontrol edilmeli ve loglanmalı
            foreach ($this->message->getActionContext() as $key => $defination) {
                $this->data[$key] = RuleEngine::evaluate($defination, ['trigger' => (object)$this->message->getMessage()]);
            }
            $this->message->setStatus(MessageStatus::ActionContextApplied);
            //todo: burada datanın kullanıcı tarafından doldurulmasını bekliyorum aslında
            // context tarafı burada kullanıcından gelecek o yüzden null bırakılan alanları temizlemk lazım
            foreach ($this->data as $key => $value) {
                if ($value === null) {
                    unset($this->data[$key]);
                }
            }
            $id = $this->data['id'];
            unset($this->data['id']);

            $response = $client->put($authentication, '/admin-api/products', $id, $this->data);
            //todo: burada bir şekilde olayı ben mi gerçekleştirdim başkası mı diye kontrol etmek için kayıt etmelisin
            $this->message->setStatus(MessageStatus::ActionApplied);
            $transaction = $communicationService->decrementCredit(
                $this->message->getUserId(),
                $this->message->getCost(),
                $this->message->getProcessId()
            );
            $this->message->setTransactionId($transaction['data']['id']);
            $this->message->setStatus(MessageStatus::TransactionCreated);
            $response = $communicationService->decrementCredit(
                $this->message->getUserId(),
                $this->message->getCost(),
                $this->message->getProcessId()
            );
            $this->message->setStatus(MessageStatus::CreditPaid);
        } catch (\Exception $exception) {
            $this->message->setStatus(MessageStatus::ActionAppliedFailure);
        }
        // todo: burada mesajı kayıt etmeliyiz
    }
}
