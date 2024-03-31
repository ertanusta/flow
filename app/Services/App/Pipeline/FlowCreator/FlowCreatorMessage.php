<?php

namespace App\Services\App\Pipeline\FlowCreator;

use App\Models\Application;
use App\Models\Condition;
use App\Models\Flow;
use App\Models\User;

class FlowCreatorMessage
{

    public function __construct(array $content)
    {
        $this->content = $content;
    }

    public array $content;

    public User $user;

    public Application $application;

    public Flow $flow;

    public Condition $condition;

    public array $triggerContent = [];

    public array $actionContent = [];

    public function getFlowName()
    {
        return $this->content['name'];
    }
}
