<?php

namespace Ideasoft\Helper;

use Illuminate\Contracts\Queue\ShouldQueue;

class ActionResolverHelper
{

    public static function getJobClass($identifier)
    {
        //todo:bu identifier başka yerde kullanılıyor olabilir mi bunun için trigger
        // tespitinde kullandığın şeyi kullansan daha sağlıklı olmaz mı?
        $explodedIdentifier = explode('_', $identifier);
        $identifier = "";
        foreach ($explodedIdentifier as $value) {
            $identifier .= '\\' . ucfirst($value);
        }
        $class = "Ideasoft\\Jobs\\Actions$identifier";
        return $class;
    }
}
