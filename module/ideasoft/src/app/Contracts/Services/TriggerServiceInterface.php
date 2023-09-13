<?php

namespace Ideasoft\Contracts\Services;

use Ideasoft\Models\Trigger;

interface TriggerServiceInterface
{
    public function getTriggerByName($triggerName): Trigger;

    public function getNameByHookData($key): string;
}
