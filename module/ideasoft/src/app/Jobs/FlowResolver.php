<?php

namespace Ideasoft\Jobs;

use Ideasoft\Contracts\Services\CommunicationServiceInterface;
use Ideasoft\Enums\MessageStatus;
use Ideasoft\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use RuleEngine\Facades\RuleEngine;

class FlowResolver implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Message $message;


    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle(CommunicationServiceInterface $communicationService): void
    {
        $this->message->setStatus(MessageStatus::FlowResolving);
        $conditions = $communicationService->findConditions($this->message->getFlowId());
        if (empty($conditions)){
            $this->message->setStatus(MessageStatus::EmptyCondition);
            return;
        }
        $ruleEvaluated = 0;
        foreach ($conditions['data'] as $condition) {
            if (!RuleEngine::evaluate($condition['condition'], ['trigger' => $this->message->getMessage()])) {
                continue;
            }
            $this->message->setConditionId($condition['id']);
            $this->message->setCondition($condition['condition']);
            $ruleEvaluated = 1;
            //todo: burada mesajlar duplicate edilmeli ama şimdilik sadece 1 adet condtion ekleteceğiz
            //todo: 404 durumu içinde bir şey yapmamız gerekiyor. communication servislerdeki tüm metodlar için
            $actionContexts = $communicationService->findActions($condition['id']);
            $this->parseActionContext($actionContexts);
        }
        if (!$ruleEvaluated){
            $this->message->setStatus(MessageStatus::TrueConditionNotExists);
            return;
        }
    }

    private function parseActionContext($actionContexts)
    {
        foreach ($actionContexts['data'] as $actionContext) {
            //todo: burada mesajlar duplicate edilmeli ama şimdilik sadece 1 adet action ekleteceğiz
            if ($actionContext['application_id'] === $this->message->getTriggerApplicationId()) {
                $this->message->setActionId($actionContext['action_id']);
                $this->message->setActionContextId($actionContext['id']);
                $this->message->setActionApplicationId($actionContext['application_id']);
                $this->message->setActionName($actionContext['action_name']);
                $this->message->setActionApplicationName($actionContext['application_name']);
                $this->message->setStatus(MessageStatus::ActionDispatched);
                $this->message->setActionContext($actionContext['context']);
                ActionResolver::dispatch($this->message);
                continue;
            }
            //todo: burası diğer uygulamalara ait
        }
    }

}
