<?php

namespace App\Services;

use App\Contants\ModuleRoutes;
use App\Contracts\Services\CommunicationServiceInterface;
use App\Models\Application;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

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

    public function getApplicationTriggers(Application $application, $query = [])
    {
        $url = ModuleRoutes::getModuleTriggers($application->identifier);
        $request = Request::create($url, 'GET', $query);
        $response = Route::dispatch($request);
        return json_decode($response->getContent(), true, 512, JSON_THROW_ON_ERROR);
    }

    public function getApplicationActions(Application $application, $query = [])
    {
        $url = ModuleRoutes::getModuleActions($application->identifier);
        $request = Request::create($url, 'GET', $query);
        $response = Route::dispatch($request);
        return json_decode($response->getContent(), true, 512, JSON_THROW_ON_ERROR);
    }

    public function getApplicationTriggerById(Application $application, $id)
    {
        $url = ModuleRoutes::getModuleTriggers($application->identifier);
        $request = Request::create($url . '/' . $id);
        $response = Route::dispatch($request);
        return json_decode($response->getContent(), true, 512, JSON_THROW_ON_ERROR);
    }

    public function getApplicationActionById(Application $application, $id)
    {
        $url = ModuleRoutes::getModuleActions($application->identifier);
        $request = Request::create($url . '/' . $id);
        $response = Route::dispatch($request);
        return json_decode($response->getContent(), true, 512, JSON_THROW_ON_ERROR);
    }
}
