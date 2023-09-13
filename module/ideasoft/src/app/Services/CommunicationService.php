<?php

namespace Ideasoft\Services;

use Ideasoft\Contracts\Services\CommunicationServiceInterface;
use Illuminate\Support\Facades\Redis;

class CommunicationService implements CommunicationServiceInterface
{

    public function publishCoreFlowResolver(array $data)
    {
        Redis::connection('core')->publish(
            'flow-resolve',
            json_encode($data, JSON_THROW_ON_ERROR)
        );
    }

    public function subscriberActionResolver(\Closure $callback)
    {
        Redis::connection('core')->subscribe(['ideasoft-action-resolver'], $callback);
    }
}
