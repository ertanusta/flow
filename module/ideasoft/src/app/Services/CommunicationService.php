<?php

namespace Ideasoft\Services;

use Ideasoft\Services\Interfaces\CommunicationServiceInterface;
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
}
