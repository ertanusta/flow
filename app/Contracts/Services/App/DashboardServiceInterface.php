<?php

namespace App\Contracts\Services\App;

use App\Models\User;

interface DashboardServiceInterface
{
    public function getCardInfos(User $user): array;
}
