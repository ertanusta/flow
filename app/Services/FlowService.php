<?php

namespace App\Services;

use App\Exceptions\ResourceNotFound;
use App\Models\Flow;
use App\Repository\Interfaces\FlowRepositoryInterface;
use App\Services\Interfaces\FlowServiceInterface;

class FlowService implements FlowServiceInterface
{

    private FlowRepositoryInterface $flowRepository;

    public function __construct(FlowRepositoryInterface $flowRepository)
    {
        $this->flowRepository = $flowRepository;
    }

    public function getById($id): Flow
    {
        $flow = $this->flowRepository->getById($id);
        if ($flow) {
            return $flow;
        }
        throw new ResourceNotFound("$id does not exist");
    }
}
