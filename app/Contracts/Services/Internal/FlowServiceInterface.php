<?php

namespace App\Contracts\Services\Internal;

use App\Models\Flow;

interface FlowServiceInterface
{
    public function findFlow($userId, $applicationId, $triggerId): ?Flow;
}
