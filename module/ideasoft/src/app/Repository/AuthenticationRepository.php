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

    public function getByUserId($userId): ?Authentication
    {
        return Authentication::query()->where('user_id', '=', $userId)->first();
    }

}
