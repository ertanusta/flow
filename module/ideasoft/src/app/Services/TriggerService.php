<?php

namespace Ideasoft\Services;

use Ideasoft\Exceptions\ResourceNotFoundException;
use Ideasoft\Models\Trigger;
use Ideasoft\Repository\Interfaces\TriggerRepositoryInterface;
use Ideasoft\Services\Interfaces\TriggerServiceInterface;

class TriggerService implements TriggerServiceInterface
{
    private TriggerRepositoryInterface $triggerRepository;

    public function __construct(TriggerRepositoryInterface $triggerRepository)
    {
        $this->triggerRepository = $triggerRepository;
    }

    public function getTriggerByName($triggerName): Trigger
    {
        /** @var Trigger|null $trigger */
        $trigger = $this->triggerRepository->findByName($triggerName);
        if ($trigger) {
            return $trigger;
        }
        throw new ResourceNotFoundException("$triggerName does not exist");
    }

    public function getNameByHookData($key): string
    {
        $keys = explode('/', $key);
        return $keys[0] . ucfirst($keys[1]);
    }
}
