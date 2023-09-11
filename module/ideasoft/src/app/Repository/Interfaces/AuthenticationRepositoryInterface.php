<?php

namespace Ideasoft\Repository\Interfaces;

use Ideasoft\Models\Authentication;

interface AuthenticationRepositoryInterface
{
    public function getById($id): ?Authentication;
}
