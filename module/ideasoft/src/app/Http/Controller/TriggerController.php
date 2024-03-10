<?php

namespace Ideasoft\Http\Controller;

use Ideasoft\Http\Resources\TriggerResource;
use Ideasoft\Models\Trigger;

class TriggerController extends Controller
{
    public function index()
    {
        return TriggerResource::collection(Trigger::all());
    }
}
