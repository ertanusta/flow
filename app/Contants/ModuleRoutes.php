<?php

namespace App\Contants;

use App\Exceptions\RouteNotFoundExpcetion;

class ModuleRoutes
{

    private static $baseRoutes = [
        'ideasoft' => 'http://localhost/ideasoft'
    ];

    public static function getBaseRoutes($identifier)
    {
        if (isset(self::$baseRoutes[$identifier])) {
            return self::$baseRoutes[$identifier];
        }
        throw new RouteNotFoundExpcetion("$identifier is not defined", 404);
    }

    public static function getModuleTriggers($identifier)
    {
        return self::getBaseRoutes($identifier) . '/triggers';
    }
}
