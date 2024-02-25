<?php

namespace App\Services\Internal;

use App\Contracts\Services\Internal\CreditServiceInterface;
use App\Models\User;

class CreditService implements CreditServiceInterface
{

    public function getCredit($userId): float
    {
        /** @var User $user */
        $user = User::query()->find($userId);
        return $user->credit;
    }
}
