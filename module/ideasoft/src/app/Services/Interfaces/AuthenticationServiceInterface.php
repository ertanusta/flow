<?php

namespace Ideasoft\Services\Interfaces;

use Ideasoft\Models\Authentication;

interface AuthenticationServiceInterface
{
    public function getById($id): Authentication;
}
