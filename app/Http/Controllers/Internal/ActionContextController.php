<?php

namespace App\Http\Controllers\Internal;

use App\Contracts\Services\Internal\ActionContextServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Internal\FindActionContextRequest;
use App\Http\Resources\Internal\ActionContextResource;

class ActionContextController extends Controller
{
    public function findActionContext(FindActionContextRequest $request, ActionContextServiceInterface $actionContextService)
    {
        $data = $request->validationData();
        $actionContexts = $actionContextService->findActionContextByConditionId($data['conditionId']);
        if ($actionContexts && !$actionContexts->isEmpty()) {
            return ActionContextResource::collection($actionContexts);
        }
        return response()->json([], 404);
    }
}
