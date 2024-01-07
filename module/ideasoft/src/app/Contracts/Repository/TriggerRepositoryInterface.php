<?php

namespace Ideasoft\Contracts\Repository;

use Ideasoft\Models\Trigger;

interface TriggerRepositoryInterface
{

    public function findByName($name): ?Trigger;
}
