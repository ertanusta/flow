<?php

namespace App\Services\App\Pipeline\FlowCreator;

use App\Models\Application;
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

}
