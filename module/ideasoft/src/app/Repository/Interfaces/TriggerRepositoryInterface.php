<?php

namespace Ideasoft\Repository\Interfaces;

use Ideasoft\Models\Trigger;

interface TriggerRepositoryInterface
{

    public function findByName($name): ?Trigger;
}
