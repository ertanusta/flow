<?php

namespace Ideasoft\Helper;

use Illuminate\Contracts\Queue\ShouldQueue;

class ActionResolverHelper
{

    public static function getJobClass($identifier): ShouldQueue
    {
        //todo:bu identifier başka yerde kullanılıyor olabilir mi bunun için trigger
        // tespitinde kullandığın şeyi kullansan daha sağlıklı olmaz mı?
        $class = "Ideasoft\\Jobs\\Actions\\$identifier";
        return new $class();
    }
}
