<?php

namespace Ideasoft\Contracts\Repository;

use Ideasoft\Models\Action;

interface ActionRepositoryInterface
{

    public function findByName($name): ?Action;

    public function findById($id): ?Action;
}
