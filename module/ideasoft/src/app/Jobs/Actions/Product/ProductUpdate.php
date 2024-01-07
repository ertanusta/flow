<?php

namespace Ideasoft\Jobs\Actions\Product;

use Ideasoft\Contracts\Client\ClientInterface;
use Ideasoft\Contracts\Services\AuthenticationServiceInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;

class ProductUpdate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $connection = "ideasoft_queue";

    public $queue = "ideasoft_product_actions";
    private $data;
    private $userId;
    private $flowId;

    public function __construct($message)
    {
        $this->data = $message['data'];
        $this->userId = $message['userId'];
        $this->flowId = $message['flowId'];
    }

    public function handle(
        ClientInterface                $client,
        AuthenticationServiceInterface $authenticationService
    )
    {
        $authentication = $authenticationService->getByUserId($this->userId);
    }
}
