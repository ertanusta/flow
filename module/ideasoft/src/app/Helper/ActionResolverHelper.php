<?php

namespace Ideasoft\Helper;

use Illuminate\Contracts\Queue\ShouldQueue;

class ActionResolverHelper
{

    public static function getJobClass($identifier): ShouldQueue
    {
        $class = "Ideasoft\\Jobs\\Actions\\$identifier";
        return new $class();
    }
}
