<?php

namespace Ideasoft\Contracts\Services;

use Ideasoft\Models\Authentication;

interface AuthenticationServiceInterface
{
    public function getById($id): Authentication;
}
