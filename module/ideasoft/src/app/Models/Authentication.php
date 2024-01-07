<?php

namespace Ideasoft\Models;

class Authentication extends AbstractModel
{
    protected $table = "authentications";
    protected $fillable = [
        'user_id',
        'application_id',
        'access_token',
        'refresh_token',
        'domain',
        'expire_time'
    ];
}
