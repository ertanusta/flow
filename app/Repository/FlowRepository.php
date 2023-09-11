<?php

namespace App\Repository;

use App\Models\Flow;
use App\Repository\Interfaces\FlowRepositoryInterface;

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
