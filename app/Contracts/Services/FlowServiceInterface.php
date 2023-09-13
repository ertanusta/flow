<?php

namespace App\Contracts\Services;

use App\Models\Flow;

interface FlowServiceInterface
{
    public function getById($id): Flow;
}
