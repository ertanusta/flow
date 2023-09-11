<?php

namespace Ideasoft\Helper;

class HashHelper
{
    public static function create(array $paramters, $key)
    {
        return hash_hmac('sha256', implode('--', $paramters), $key);
    }

    public static function isValid($requestHash, $createdHash)
    {
        return $requestHash === $createdHash;
    }
}
