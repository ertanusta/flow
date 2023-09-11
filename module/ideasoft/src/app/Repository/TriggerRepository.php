<?php

namespace Ideasoft\Repository;

use Ideasoft\Models\Trigger;
use Ideasoft\Repository\Interfaces\TriggerRepositoryInterface;

class TriggerRepository implements TriggerRepositoryInterface
{
    public function findByName($name): ?Trigger
    {
        /** @var null|Trigger $trigger */
        $trigger = Trigger::query()->where('identifier', '=', $name)
            ->first();
        return $trigger;
    }

}
