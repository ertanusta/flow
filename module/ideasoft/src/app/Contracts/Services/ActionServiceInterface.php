<?php

namespace Ideasoft\Contracts\Services;

use Ideasoft\Models\Action;

interface ActionServiceInterface
{
    public function getActionById($identifier): Action;
}
