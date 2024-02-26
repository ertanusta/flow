<?php

namespace App\Http\Controllers\Internal;

use App\Contracts\Services\Internal\FlowServiceInterface;
use App\Http\Requests\Internal\FlowFinderRequest;
use App\Http\Resources\Internal\FlowResource;

class FlowController
{

    public function flowFind(FlowFinderRequest $request, FlowServiceInterface $flowService)
    {
        $data = $request->validationData();
        $flow = $flowService->findFlow(
            $data['userId'],
            $data['applicationId'],
            $data['triggerId']
        );
        if ($flow) {
            return new FlowResource($flow);
        }
        return response()->json([], 404);
    }
}
