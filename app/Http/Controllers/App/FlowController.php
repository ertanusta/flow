<?php

namespace App\Http\Controllers\App;

use App\Contracts\Services\App\FlowServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\App\FlowResource;
use App\Models\Application;

class FlowController extends Controller
{
    public function index()
    {
        return view('flow.index');
    }

    public function all(FlowServiceInterface $flowService)
    {
        $flows = $flowService->getFlows(auth()->user());
        return FlowResource::collection($flows);
    }

    public function create()
    {
        $applications = Application::all();
        return view('flow.new',['applications' => $applications]);
    }
}
