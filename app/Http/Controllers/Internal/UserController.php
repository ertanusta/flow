<?php

namespace App\Http\Controllers\Internal;

use App\Contracts\Services\Internal\CreditServiceInterface;
use App\Http\Requests\Internal\CheckCreditRequest;
use App\Http\Requests\Internal\GetPaidRequest;
use App\Http\Resources\Internal\TransationResource;
use Illuminate\Support\Facades\Response;

class UserController
{
    public function checkCredit(CheckCreditRequest $request, CreditServiceInterface $creditService)
    {
        $data = $request->validationData();
        $credit = $creditService->getCredit($data['userId']);
        return Response::json(['available' => $credit > 0, 'credit' => $credit]);
    }

    public function getPaid(GetPaidRequest $request, CreditServiceInterface $creditService)
    {
        $data = $request->validationData();
        $transaction = $creditService->getPaid($data['userId'], $data['amount'], $data['processId']);
        return new TransationResource($transaction);
    }
}
