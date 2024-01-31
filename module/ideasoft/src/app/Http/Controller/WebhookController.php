<?php

namespace Ideasoft\Http\Controller;

use Ideasoft\Constants\TriggerConstants;
use Ideasoft\Helper\HashHelper;
use Ideasoft\Jobs\MessageReceiver;
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
            MessageReceiver::dispatch(
                $request->query->get('authId'),
                $request->toArray()['data'],
                TriggerConstants::PRODUCT_UPDATE // her biriin ayrı bir urli olacak neticede
            );
        }
        return Response::json();
    }
}
