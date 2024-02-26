<?php

namespace Ideasoft\Jobs\Actions\Product;

use Ideasoft\Contracts\Client\ClientInterface;
use Ideasoft\Contracts\Services\AuthenticationServiceInterface;
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
        'productUpdate için gerekli olan bilgiler burada olacak'
    ];


    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function handle(
        ClientInterface                $client,
        AuthenticationServiceInterface $authenticationService
    )
    {
        $authentication = $authenticationService->refreshAccessToken($this->message->getAuthentication());
        $data = RuleEngine::evaluate($this->message->getActionContext(), [
            'action' => $this->data, 'trigger' => $this->message->getActionContext()
        ]);

        //todo: burada datanın kullanıcı tarafından doldurulmasını bekliyorum aslında
        // context tarafı burada kullanıcından gelecek o yüzden null bırakılan alanları temizlemk lazım
        foreach ($data as $key => $value){
            if ($value === null){
                unset($data[$key]);
            }
        }
        $id = $data['id'];
        unset($data['id']);
        $response = $client->put($authentication,'/admin-api/products',$id,$data);

        //todo: burada kredi düşürülmeli bu işlem için bir API servisi hazırlayıp düzenlemek kolay olacaktır.
    }
}
