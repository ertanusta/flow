<?php

namespace App\Jobs;

use App\Models\TriggerContext;
use App\Services\Interfaces\FlowServiceInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Redis;
use RuleEngine\Facades\RuleEngine;

class FlowResolverJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $connection = "core.queue";
    public $queue = "core-flow-resolver";
    private $userId;
    private $flowId;
    private $applicationId;
    private $triggerId;
    private $data;

    public function __construct(
        $userId,
        $flowId,
        $applicationId,
        $triggerId,
        $data
    )
    {
        $this->userId = $userId;
        $this->flowId = $flowId;
        $this->applicationId = $applicationId;
        $this->triggerId = $triggerId;
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(
        FlowServiceInterface $flowService
    ): void
    {
       $flow =  $flowService->getById($this->flowId);
       $triggerContexts = $flow->getTriggerConditions()->get();
       /** @var TriggerContext $triggerContext */
        foreach ($triggerContexts as $triggerContext) {
           if (RuleEngine::evaluate($triggerContext->condition,$this->data)){
               $actionContexts = $triggerContext->getActionContext()->get();
               foreach ($actionContexts as $actionContext){
                   // todo: applicationın action işlemini gerçekleştirecek yere gönder
                   Redis::connection('core')->publish();
               }
           }
       }
    }
}
