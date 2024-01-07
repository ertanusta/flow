<?php

namespace App\Services;

use App\Contracts\Services\CommunicationServiceInterface;
use Illuminate\Support\Facades\Redis;

class CommunicationService implements CommunicationServiceInterface
{

    public function publishModuleActionResolver($moduleName, array $data)
    {
        //todo: burası redis pub sub kalacak
        Redis::connection('core')->client()->lPush(
            "$moduleName-action-resolver",
            json_encode($data, JSON_THROW_ON_ERROR)
        );

    }

    public function subscribeFlowResolver(\Closure $callback)
    {
        Redis::connection('core')->subscribe(['flow-resolve'], $callback);
    }
}
