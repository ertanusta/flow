<?php

namespace App\Contracts\Services;

interface CommunicationServiceInterface
{
    public function publisModuleActionResolver($moduleName, array $data);

    public function subscriberFlowResolver(\Closure $callback);
}
