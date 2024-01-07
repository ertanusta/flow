<?php

namespace Ideasoft\Repository;

use App\Models\Flow;
use Ideasoft\Contracts\Repository\FlowRepositoryInterface;
use Illuminate\Support\Facades\DB;

class FlowRepository implements FlowRepositoryInterface
{
    public function getByModule($userId, $applicationId, $moduleId): ?Flow
    {
        /** @var Flow|null $flow */
        $flow = DB::connection('core')
            ->table('flow')
            ->where('user_id', '=', $userId)
            ->where('module_id', '=', $moduleId)
            ->where('application_id', '=', $applicationId)
            ->first();
        return $flow;
    }

}
