<?php

namespace App\Http\Controllers\App;

use App\Contracts\Services\App\FlowServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\FlowCreateRequest;
use App\Http\Resources\App\FlowResource;
use App\Models\Application;
use App\Models\Flow;
use App\Services\App\Pipeline\FlowCreator\FlowCreatorMessage;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class FlowController extends Controller
{
    public function index()
    {
        return view('flow.index');
    }

    public function all(Request $request, FlowServiceInterface $flowService)
    {
        /** @var LengthAwarePaginator $flows */
        $flows = $flowService->getFlows(auth()->user());
        $collection = FlowResource::collection($flows);
        $collection->additional['draw'] = $request->get('draw');
        $collection->additional['recordsFiltered'] = $flows->total();
        $collection->additional['recordsTotal'] = $flows->total();
        return $collection;
    }

    public function create()
    {
        $applications = Application::all();
        return view('flow.new', ['applications' => $applications]);
    }

    public function store(FlowCreateRequest $request, FlowServiceInterface $flowService)
    {
        /** @var FlowCreatorMessage $message */
        $message = $flowService->create($request->validationData());
        // todo: buraya düzgün bir response dönmemiz lazım tasarım tarafında güzel modal şeyleri var
        return response()->json('Okey Abi');
    }

    public function destroy(Flow $flow)
    {
        $flow->delete();
        return response()->json('Okey');
    }
}
