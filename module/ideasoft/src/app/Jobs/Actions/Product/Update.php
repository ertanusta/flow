<?php

namespace Ideasoft\Jobs\Actions\Product;

use Ideasoft\Contracts\Client\ClientInterface;
use Ideasoft\Contracts\Services\AuthenticationServiceInterface;
use Ideasoft\Contracts\Services\CommunicationServiceInterface;
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
        CommunicationServiceInterface $communicationService
    )
    {
        $authentication = $authenticationService->refreshAccessToken($this->message->getAuthentication());
        //todo: burada bir hata gerçekleşebilir bu yüzden try catch e alınıp kontrol edilmeli ve loglanmalı
        foreach ($this->message->getActionContext() as $key => $defination) {
            $this->data[$key] = RuleEngine::evaluate($defination, ['trigger' => (object)$this->message->getMessage()]);
        }
        //todo: burada datanın kullanıcı tarafından doldurulmasını bekliyorum aslında
        // context tarafı burada kullanıcından gelecek o yüzden null bırakılan alanları temizlemk lazım
        foreach ($this->data as $key => $value) {
            if ($value === null) {
                unset($this->data[$key]);
            }
        }
        $id = $this->data['id'];
        unset($this->data['id']);
        try {
            $response = $client->put($authentication, '/admin-api/products', $id, $this->data);
        }catch (\Exception $exception){
            //todo: burası loglanmalı
        }
        $transaction = $communicationService->decrementCredit(
            $this->message->getUserId(),
            $this->message->getCost(),
            $this->message->getProcessId()
        );
        $this->message->setTransactionId($transaction['data']['id']);
        //todo: burada kredi düşürülmeli bu işlem için bir API servisi hazırlayıp düzenlemek kolay olacaktır.
    }
}
