<?php

namespace App\Contracts\Repository;

use App\Models\Application;

interface ApplicationRepositoryInterface
{
    public function getApplicationById($applicationId): Application;
}
