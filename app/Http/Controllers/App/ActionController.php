<?php

namespace App\Http\Controllers\App;

use App\Contracts\Repository\ApplicationRepositoryInterface;
use App\Contracts\Services\CommunicationServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\ActionRequest;
use App\Http\Requests\App\TriggerRequest;

class ActionController extends Controller
{
    public function all(ActionRequest $request, CommunicationServiceInterface $communicationService, ApplicationRepositoryInterface $applicationRepository)
    {
        $application = $applicationRepository->getApplicationById($request->get('applicationId'));
        $response = $communicationService->getApplicationActions($application);
        return response()->json($response);
    }
}
