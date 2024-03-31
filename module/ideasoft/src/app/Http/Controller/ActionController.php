<?php

namespace Ideasoft\Http\Controller;

use Ideasoft\Http\Resources\ActionResource;
use Ideasoft\Models\Action;

class ActionController extends Controller
{
    public function index()
    {
        //todo: request parametresine göre ayarla search geliyor
        return ActionResource::collection(Action::all());
    }

    public function show($id)
    {
        $action = Action::query()->where('id', $id)->firstOrFail();
        return new ActionResource($action);
    }
}
