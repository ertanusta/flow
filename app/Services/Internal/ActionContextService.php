<?php

namespace App\Services\Internal;

use App\Contracts\Services\Internal\ActionContextServiceInterface;
use App\Models\ActionContext;
use Illuminate\Database\Eloquent\Collection;

class ActionContextService implements ActionContextServiceInterface
{

    public function findActionContextByConditionId($conditionId): ?Collection
    {
        return ActionContext::query()->where('condition_id', $conditionId)->get();
    }
}
