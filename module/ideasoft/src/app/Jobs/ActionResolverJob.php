<?php

namespace Ideasoft\Jobs;

use Ideasoft\Contracts\Repository\ActionRepositoryInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use RuleEngine\Facades\RuleEngine;

class ActionResolverJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $connection = "ideasoft_queue";

    public $queue = "ideasoft_action_execute";

    private $flowId;
    private $context;
    private $triggerData;
    private $userId;
    private $actionId;

    public function __construct($flowId, $context, $triggerData, $userId, $actionId)
    {
        $this->flowId = $flowId;
        $this->context = $context;
        $this->triggerData = $triggerData;
        $this->userId = $userId;
        $this->actionId = $actionId;
    }

    public function handle(
        ActionRepositoryInterface $actionRepository
    )
    {
        $action = $actionRepository->findById($this->actionId);
        // todo: authentication var mı yok mu bir bak
        $triggerData = $this->triggerData;
        foreach ($this->context as $key => $value) {
            $this->context[$key] = RuleEngine::evaluate($value, [
                'trigger' => $triggerData
            ]);
        }
        $action->class::dispatch($this->context)->onQueue($action->identifier);
    }
}
