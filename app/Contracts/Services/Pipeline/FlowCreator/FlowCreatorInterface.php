<?php

namespace App\Contracts\Services\Pipeline\FlowCreator;

use App\Services\App\Pipeline\FlowCreator\FlowCreatorMessage;

interface FlowCreatorInterface
{

    public function handle(FlowCreatorMessage $message, \Closure $next);

}
