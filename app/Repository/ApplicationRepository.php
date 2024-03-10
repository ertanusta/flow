<?php

namespace App\Repository;

use App\Contracts\Repository\ApplicationRepositoryInterface;
use App\Models\Application;

class ApplicationRepository implements ApplicationRepositoryInterface
{

    public function getApplicationById($applicationId): Application
    {
        /** @var Application $application */
        $application = Application::query()->where('id', '=', $applicationId)->firstOrFail();
        return $application;
    }
}
