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
    public function productUpdateHook(Request $request)
    {
        $requestHash = $request->headers->get('hash');
        $createdHash = HashHelper::create(
            $request->toArray(),
            Config::get('clients.ideasoft.client_secret')
        );
        if (HashHelper::isValid($requestHash, $createdHash)) {
            try {
                MessageReceiver::dispatch(
                    $request->query->get('authId'),
                    $request->toArray()['data'],
                    TriggerConstants::PRODUCT_UPDATE // her biriin ayrı bir urli olacak neticede
                );
            }catch (\Exception $exception){
                dd($exception);
            }
        }
        return Response::json();
    }
}
