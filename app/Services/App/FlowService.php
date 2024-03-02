<?php

namespace App\Services\App;

use App\Contracts\Services\App\FlowServiceInterface;
use App\Models\User;

class FlowService implements FlowServiceInterface
{

    public function getFlows(User $user)
    {
        return $user->getFlows()
            ->with('application')
            ->paginate(10);
    }
}
