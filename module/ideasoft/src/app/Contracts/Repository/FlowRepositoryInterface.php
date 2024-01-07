<?php

namespace Ideasoft\Contracts\Repository;

use App\Models\Flow;

interface FlowRepositoryInterface
{
    public function getByModule($userId, $applicationId, $moduleId): ?Flow;
}
