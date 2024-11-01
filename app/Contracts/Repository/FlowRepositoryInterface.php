<?php

namespace App\Contracts\Repository;

use App\Models\Flow;

interface FlowRepositoryInterface
{
    public function getById($id): ?Flow;

    public function getByQuery(array $whereConditions): ?Flow;
}
