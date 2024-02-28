<?php

namespace Ideasoft\Jobs;

use Ideasoft\Contracts\Services\ActionServiceInterface;
use Ideasoft\Enums\MessageStatus;
use Ideasoft\Helper\ActionResolverHelper;
use Ideasoft\Message;
use Ideasoft\Models\Action;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ActionResolver implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Message $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function handle(ActionServiceInterface $actionService)
    {
        try {
            $this->message->setStatus(MessageStatus::ActionResolve);
            /** @var Action $action */
            $action = $actionService->getActionById($this->message->getActionId());
            $this->message->setCost($action->cost);
            ActionResolverHelper::getJobClass($action->identifier)::dispatch(
                $this->message
            );
        }catch (\Exception $e) {
            $this->message->setStatus(MessageStatus::ActionResolveFailure);
            //todo: failure durumlarını kontrol edebilmek için loglayalım
        }
    }
}
