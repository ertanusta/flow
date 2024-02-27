<?php

namespace App\Services\Internal;

use App\Contracts\Services\Internal\CreditServiceInterface;
use App\Enums\TransactionProcessEnum;
use App\Models\Transaction;
use App\Models\User;

class CreditService implements CreditServiceInterface
{

    public function getCredit($userId): float
    {
        /** @var User $user */
        $user = User::query()->find($userId);
        return $user->credit;
    }

    public function getPaid($userId, $amount, $processId): Transaction
    {
        /** @var User $user */
        $user = User::query()->find($userId);
        $user->credit -= $amount;
        /** @var Transaction $transaction */
        $transaction = Transaction::create([
            "user_id" => $user->id,
            "amount" => $amount,
            "process_id" => $processId,
            "process" => TransactionProcessEnum::SUCCESS
        ]);
        return $transaction;
    }
}
