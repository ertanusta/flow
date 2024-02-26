<?php

namespace App\Http\Controllers\Internal;

use App\Contracts\Services\Internal\ConditionServceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Internal\FindConditionRequest;
use App\Http\Resources\Internal\ConditionResource;

class ConditionController extends Controller
{
    public function findCondition(FindConditionRequest $request, ConditionServceInterface $conditionServce)
    {
        $data = $request->validationData();
        $conditions = $conditionServce->getConditionsByFlowId($data['flowId']);
        if ($conditions && !$conditions->isEmpty()) {
            return  ConditionResource::collection($conditions);
        }
        return response()->json([], 404);
    }
}
