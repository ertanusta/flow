<?php

namespace Ideasoft\Models;

use Ideasoft\Contracts\Models\AuthenticationInterface;

/**
 * @property $user_id
 * @property $application_id
 * @property $access_token
 * @property $refresh_token
 * @property $domain
 * @property $expire_time
 */
class Authentication extends AbstractModel implements AuthenticationInterface
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
