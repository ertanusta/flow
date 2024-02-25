<?php

namespace App\Contracts\Services\Internal;

interface CreditServiceInterface
{
    public function getCredit($userId): float;
}
