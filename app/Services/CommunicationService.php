<?php

namespace App\Services;

use App\Contracts\Services\CommunicationServiceInterface;
use Illuminate\Support\Facades\Redis;

class CommunicationService implements CommunicationServiceInterface
{

    public function publisModuleActionResolver($moduleName, array $data)
    {
        Redis::connection('core')->publish(
            "$moduleName-action-resolver",
            json_encode($data, JSON_THROW_ON_ERROR)
        );
    }

    public function subscriberFlowResolver(\Closure $callback)
    {
        Redis::connection('core')->subscribe(['flow-resolve'], $callback);
    }
}
