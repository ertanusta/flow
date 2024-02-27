<?php

namespace App\Contracts\Services\Internal;

use App\Models\Transaction;

interface CreditServiceInterface
{
    public function getCredit($userId): float;

    public function getPaid($userId, $amount, $processId): Transaction;
}
