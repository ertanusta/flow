<?php

namespace App\Http\Controllers\App;

use App\Contracts\Services\CommunicationServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\TriggerRequest;

class TriggerController extends Controller
{
    public function all(TriggerRequest $request, CommunicationServiceInterface $communicationService)
    {

    }
}
