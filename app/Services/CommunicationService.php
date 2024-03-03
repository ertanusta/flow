<?php

namespace App\Services;

use App\Contracts\Services\CommunicationServiceInterface;
use App\Models\Application;
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

    public function getApplicationTriggers(Application $application)
    {
        // app için internal request atılacak yada bir sınıf yardımıyla (Gateway) doğru adres bulunacak
        // address defteri gibi
    }
}
