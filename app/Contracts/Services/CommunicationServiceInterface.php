<?php

namespace App\Contracts\Services;

use App\Models\Application;

interface CommunicationServiceInterface
{
    public function publishModuleActionResolver($moduleName, array $data);

    public function subscribeFlowResolver(\Closure $callback);

    public function getApplicationTriggers(Application $application, $query = []);

    public function getApplicationActions(Application $application, $query = []);

    public function getApplicationTriggerById(Application $application, $id);

    public function getApplicationActionById(Application $application, $id);

}
