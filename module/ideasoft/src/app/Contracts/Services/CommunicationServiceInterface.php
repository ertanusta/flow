<?php

namespace Ideasoft\Contracts\Services;

interface CommunicationServiceInterface
{
    public function publishCoreFlowResolver(array $data);

    public function subscribeActionResolver(\Closure $callback);
}
