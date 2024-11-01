<?php

namespace App\Contracts\Services\App;

use App\Models\User;

interface FlowServiceInterface
{

    public function getFlows(User $user, $query = []);

    public function create(array $flowData);
}
