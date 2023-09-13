<?php

namespace App\Repository;

use App\Contracts\Repository\FlowRepositoryInterface;
use App\Models\Flow;

class FlowRepository implements FlowRepositoryInterface
{

    public function getById($id): ?Flow
    {
        return Flow::query()->find($id);
    }

    public function getByQuery(array $whereConditions): ?Flow
    {
        $query = Flow::query();
        foreach ($whereConditions as $whereCondition) {
            $query = $query->where($whereCondition);
        }
        return $query->first();
    }
}
