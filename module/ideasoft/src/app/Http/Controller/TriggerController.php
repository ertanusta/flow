<?php

namespace Ideasoft\Http\Controller;

use Ideasoft\Http\Resources\TriggerResource;
use Ideasoft\Models\Trigger;

class TriggerController extends Controller
{
    public function index()
    {
        //todo: request parametresine göre ayarla search geliyor
        return TriggerResource::collection(Trigger::all());
    }

    public function show($id)
    {
        $trigger = Trigger::query()->where('id',1)->firstOrFail();
        return new TriggerResource($trigger);
    }
}
