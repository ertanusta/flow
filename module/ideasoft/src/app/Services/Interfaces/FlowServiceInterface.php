<?php

namespace Ideasoft\Services\Interfaces;

use App\Models\Flow;

interface FlowServiceInterface
{
    public function getByModule($userId, $applicationId, $moduleId): Flow;
}
