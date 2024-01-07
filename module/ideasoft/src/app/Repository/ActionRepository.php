<?php

namespace Ideasoft\Repository;

use Ideasoft\Contracts\Repository\ActionRepositoryInterface;
use Ideasoft\Models\Action;
use Ideasoft\Models\Trigger;

class ActionRepository implements ActionRepositoryInterface
{
    public function findByName($name): ?Action
    {
        /** @var null|Action $action */
        $action = Action::query()->where('identifier', '=', $name)
            ->first();
        return $action;
    }

    public function findById($id): ?Action
    {
        return Action::query()->find($id);
    }
}
