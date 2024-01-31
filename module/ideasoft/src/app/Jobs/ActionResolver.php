<?php

namespace Ideasoft\Jobs;

use Ideasoft\Contracts\Repository\ActionRepositoryInterface;
use Ideasoft\Enums\MessageStatus;
use Ideasoft\Helper\ActionResolverHelper;
use Ideasoft\Message;
use Ideasoft\Models\Action;
use Ideasoft\Models\Authentication;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ActionResolver implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $connection = "ideasoft.queue";

    public $queue = "ideasoft_action_resolver";
    private Message $message;


    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function handle(ActionRepositoryInterface $actionRepository)
    {
        $this->message->setStatus(MessageStatus::ActionResolve);
        /** @var Action $action */
        $action = $actionRepository->findById($this->message->getActionId());
        $this->message->setCost($action->cost);
        ActionResolverHelper::getJobClass($action->identifier)::dispatch(
           $this->message
        );
    }
}
