<?php

namespace Ideasoft\Services;

use Ideasoft\Contracts\Repository\ActionRepositoryInterface;
use Ideasoft\Contracts\Services\ActionServiceInterface;
use Ideasoft\Models\Action;

class ActionService implements ActionServiceInterface
{
    private ActionRepositoryInterface $actionRepository;

    public function __construct(ActionRepositoryInterface $actionRepository)
    {
        $this->actionRepository = $actionRepository;
    }

    public function getActionById($identifier): Action
    {
        return $this->actionRepository->findById($identifier);
    }
}
