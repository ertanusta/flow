<?php

namespace App\Http\Controllers\Internal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Internal\FindConditionRequest;
use Illuminate\Http\Request;

class ConditionController extends Controller
{
    public function findCondition(FindConditionRequest $request)
    {
        $data = $request->validationData();
        //todo: burası doldurulacak genelde flow a göre condition getirilecek
    }
}
