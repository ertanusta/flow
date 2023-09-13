<?php

namespace Ideasoft\Contracts\Repository;

use Ideasoft\Models\Authentication;

interface AuthenticationRepositoryInterface
{
    public function getById($id): ?Authentication;
}
