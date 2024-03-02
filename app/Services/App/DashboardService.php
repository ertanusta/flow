<?php

namespace App\Services\App;

use App\Contracts\Services\App\DashboardServiceInterface;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class DashboardService implements DashboardServiceInterface
{

    public function getCardInfos(User $user): array
    {
        //todo: redis ile cache yapmalısın expire ile
        $data =  [
            'avaible_credit' => $user->credit,
            'flow_count' => $user->getFlows()->count(),
            'process_count' => $user->getProcess()->count(),
            'last_processes' => $user->getProcess()->orderBy('id','desc')->limit(5)->get()
        ];
        return $data;
    }
}
