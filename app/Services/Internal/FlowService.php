<?php

namespace App\Services\Internal;

use App\Contracts\Services\Internal\FlowServiceInterface;
use App\Models\Flow;

class FlowService implements FlowServiceInterface
{

    public function findFlow($userId, $applicationId, $triggerId): ?Flow
    {
        /** @var Flow $flow */
        $flow = Flow::query()->where('user_id', $userId)
            ->where('application_id', $applicationId)
            ->where('trigger_id', $triggerId)
            ->first();
        return $flow;
    }
}
