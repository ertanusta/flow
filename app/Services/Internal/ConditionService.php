<?php

namespace App\Services\Internal;

use App\Contracts\Services\Internal\ConditionServceInterface;
use App\Models\Condition;
use Illuminate\Database\Eloquent\Collection;

class ConditionService implements ConditionServceInterface
{

    public function getConditionsByFlowId($flowId): ?Collection
    {
        /** @var Collection|null $conditions */
        $conditions = Condition::query()->where('flow_id', $flowId)->get();
        return $conditions;
    }
}
