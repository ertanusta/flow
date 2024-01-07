<?php

namespace Ideasoft\Repository;

use Ideasoft\Contracts\Repository\TriggerRepositoryInterface;
use Ideasoft\Models\Trigger;

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
