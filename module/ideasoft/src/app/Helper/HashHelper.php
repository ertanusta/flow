<?php

namespace Ideasoft\Helper;

class HashHelper
{
    public static function create(array $paramters, $key)
    {
        return hash_hmac('sha256', json_encode($paramters), $key);
    }

    public static function isValid($requestHash, $createdHash)
    {
        return true; // todo: şimdilik ekledim
        return $requestHash === $createdHash;
    }
}
