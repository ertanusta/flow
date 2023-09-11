<?php

namespace App\Services\Interfaces;

use App\Models\Flow;

interface FlowServiceInterface
{
    public function getById($id): Flow;
}
