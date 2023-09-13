<?php

namespace Ideasoft\Repository;

use Ideasoft\Contracts\Repository\AuthenticationRepositoryInterface;
use Ideasoft\Models\Authentication;

class AuthenticationRepository implements AuthenticationRepositoryInterface
{
    public function getById($id): ?Authentication
    {
        return Authentication::query()->find($id);
    }

}
