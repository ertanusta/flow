<?php

namespace App\Contracts\Services;

interface CommunicationServiceInterface
{
    public function publishModuleActionResolver($moduleName, array $data);

    public function subscribeFlowResolver(\Closure $callback);
}
