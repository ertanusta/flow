<?php

namespace App\Contracts\Services\Internal;

use Illuminate\Database\Eloquent\Collection;

interface ActionContextServiceInterface
{
    public function findActionContextByConditionId($conditionId): ?Collection;
}
