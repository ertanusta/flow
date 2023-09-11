<?php

namespace Ideasoft\Repository\Interfaces;

use App\Models\Flow;

interface FlowRepositoryInterface
{
    public function getByModule($userId, $applicationId, $moduleId): ?Flow;
}
