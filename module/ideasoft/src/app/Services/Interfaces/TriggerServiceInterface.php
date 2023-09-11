<?php

namespace Ideasoft\Services\Interfaces;

use Ideasoft\Models\Trigger;

interface TriggerServiceInterface
{
    public function getTriggerByName($triggerName): Trigger;

    public function getNameByHookData($key): string;
}
