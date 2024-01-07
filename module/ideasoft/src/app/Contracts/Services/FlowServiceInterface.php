<?php

namespace Ideasoft\Contracts\Services;

use App\Models\Flow;

interface FlowServiceInterface
{
    public function getByModule($userId, $applicationId, $moduleId): Flow;
}
