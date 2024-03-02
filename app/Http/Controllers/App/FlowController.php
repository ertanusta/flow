<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;

class FlowController extends Controller
{
    public function index()
    {
        return view('flow.index');
    }

    public function all()
    {
        return response()->json(
            [
                "draw" => 1,
                "recordsTotal" => 1,
                "recordsFiltered" => 1,
                "data" => [
                    [
                        'id' => 1,
                        'name' => 'Test1',
                        'eventName' => 'Application-Event',
                        'actionName' => 'Application-Action',
                        'status' => false,
                        'workingCount' => 431
                    ]
                ]
            ]
        );
    }
}
