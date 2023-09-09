<?php

namespace Ideasoft\Models;

class Authentication extends AbstractModel
{
    protected $table = "authentications";
    protected $fillable = [
        'access_token',
        'refresh_token',
        'domain',
        'expire_time'
    ];
}
