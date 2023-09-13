<?php

namespace Ideasoft\Http\Controller;

use Ideasoft\Helper\HashHelper;
use Ideasoft\Jobs\HookJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;

class WebhookController extends Controller
{
    public function hook(Request $request)
    {
        $requestHash = $request->headers->get('hash');
        $createdHash = HashHelper::create(
            $request->toArray(),
            Config::get('clients.ideasoft.client_secret')
        );
        if (HashHelper::isValid($requestHash, $createdHash)) {
            HookJob::dispatch(
                $request->query->get('authId'),
                $request->toArray()
            );
        }
        return Response::json();
    }
}
