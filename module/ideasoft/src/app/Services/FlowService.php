<?php

namespace Ideasoft\Services;

use App\Models\Flow;
use Ideasoft\Contracts\Repository\FlowRepositoryInterface;
use Ideasoft\Contracts\Services\FlowServiceInterface;
use Ideasoft\Exceptions\ResourceNotFoundException;

class FlowService implements FlowServiceInterface
{
    private FlowRepositoryInterface $flowRepository;

    public function __construct(FlowRepositoryInterface $flowRepository)
    {
        $this->flowRepository = $flowRepository;
    }

    public function getByModule($userId, $applicationId, $moduleId): Flow
    {
        $flow = $this->flowRepository->getByModule($userId, $applicationId, $moduleId);
        if ($flow) {
            return $flow;
        }
        throw new ResourceNotFoundException("Could not find resource: $userId , $applicationId, $moduleId");
    }

}
