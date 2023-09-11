<?php

namespace Ideasoft\Repository;

use Ideasoft\Models\Authentication;
use Ideasoft\Repository\Interfaces\AuthenticationRepositoryInterface;

class AuthenticationRepository implements AuthenticationRepositoryInterface
{
    public function getById($id): ?Authentication
    {
        return Authentication::query()->find($id);
    }

}
