<?php

namespace App\Contracts\Services\Internal;

use App\Models\Condition;
use Illuminate\Database\Eloquent\Collection;

interface ConditionServceInterface
{
    public function getConditionsByFlowId($flowId): ?Collection;
}
