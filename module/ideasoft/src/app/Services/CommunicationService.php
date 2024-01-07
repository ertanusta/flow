<?php

namespace Ideasoft\Services;

use Ideasoft\Contracts\Services\CommunicationServiceInterface;
use Illuminate\Support\Facades\Redis;

class CommunicationService implements CommunicationServiceInterface
{

    public function publishCoreFlowResolver(array $data)
    {
        //todo: burasını redis pub sub değil de job a ata
        Redis::connection('core')->publish(
            'flow-resolve',
            json_encode($data, JSON_THROW_ON_ERROR)
        );
    }

    public function subscribeActionResolver(\Closure $callback)
    {
        $callback(
            Redis::connection('core')->client()->rPop('ideasoft-action-resolver', 100)
        );
    }
}
