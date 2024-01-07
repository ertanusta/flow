<?php

namespace App\Jobs;

use App\Contracts\Services\CommunicationServiceInterface;
use App\Contracts\Services\FlowServiceInterface;
use App\Models\ActionContext;
use App\Models\TriggerContext;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use RuleEngine\Facades\RuleEngine;

class FlowResolverJob implements ShouldQueue
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
        FlowServiceInterface          $flowService,
        CommunicationServiceInterface $communicationService
    ): void
    {
        $flow = $flowService->getById($this->flowId);
        $triggerContexts = $flow->getTriggerConditions()->get();
        /** @var TriggerContext $triggerContext */
        foreach ($triggerContexts as $triggerContext) {
            if (!RuleEngine::evaluate($triggerContext->condition, $this->data)) {
                continue;
            }
            $this->publishModuleAction($triggerContext, $communicationService);
        }
    }

    private function publishModuleAction(TriggerContext $triggerContext, CommunicationServiceInterface $communicationService)
    {
        $actionContexts = $triggerContext->getActionContext()->get();
        /** @var ActionContext $actionContext */
        foreach ($actionContexts as $actionContext) {
            $moduleName = $actionContext->getApplication()->first()->name;
            $communicationService->publishModuleActionResolver(
                $moduleName,
                [
                    'triggerData' => $this->data,
                    'context' => $actionContext->context,
                    'actionId' => $actionContext->module_id,
                    'userId' => $this->userId,
                    'flowId' => $this->flowId
                ]
            );
        }
    }
}
