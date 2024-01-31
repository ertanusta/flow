<?php

namespace App\Http\Controllers\Internal;

use App\Http\Requests\Internal\CheckCreditRequest;

class UserController
{

    public function checkCredit(CheckCreditRequest $request)
    {
        $data = $request->validationData();
        //todo: gerçekten burayı kontrol etmeli ve ona göre bir response dönmeli.
    }
}
