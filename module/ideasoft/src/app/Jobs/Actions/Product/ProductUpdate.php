<?php

namespace Ideasoft\Jobs\Actions\Product;

use Ideasoft\Contracts\Client\ClientInterface;
use Ideasoft\Contracts\Services\AuthenticationServiceInterface;
use Ideasoft\Message;
use Ideasoft\Models\Authentication;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProductUpdate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $connection = "ideasoft_queue";

    public $queue = "ideasoft_product_update_action";

    private Message $message;


    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function handle(
        ClientInterface                $client,
        AuthenticationServiceInterface $authenticationService
    )
    {

        /**
         * Authentication modeli refresh et
         * Authentication model eğer expire olmuş ise access token renew et
         * Rule engine i çalıştırıp gönderilecek data hazırlanmalı
         * İstek gönderilmeden önce gönderilecek data message objesine set edilmeli
         * İstek gönderildikten sonra kredi düşürülmeli
         */
        /**
         *
         */
        $response = $client->put();
    }
}
