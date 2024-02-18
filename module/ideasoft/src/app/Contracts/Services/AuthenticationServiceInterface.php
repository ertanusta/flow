<?php

namespace Ideasoft\Contracts\Services;

use Ideasoft\Models\Authentication;

interface AuthenticationServiceInterface
{
    public function getById($id): Authentication;

    public function getByUserId($userId): Authentication;

    public function refreshAccessToken(Authentication $authentication): Authentication;
}
