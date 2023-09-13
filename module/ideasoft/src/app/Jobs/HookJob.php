<?php

namespace Ideasoft\Jobs;

use Ideasoft\Contracts\Services\AuthenticationServiceInterface;
use Ideasoft\Contracts\Services\CommunicationServiceInterface;
use Ideasoft\Contracts\Services\FlowServiceInterface;
use Ideasoft\Contracts\Services\TriggerServiceInterface;
use Ideasoft\Exceptions\ResourceNotFoundException;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class HookJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $connection = "ideasoft_queue";

    public $queue = "ideasoft_hook";
    private $authenticationId;
    private $hookData;


    public function __construct($authenticationId, $hookData)
    {
        $this->authenticationId = $authenticationId;
        $this->hookData = $hookData;
    }

    /**
     * @throws ResourceNotFoundException
     */
    public function handle(
        TriggerServiceInterface        $triggerService,
        AuthenticationServiceInterface $authenticationService,
        FlowServiceInterface           $flowService,
        CommunicationServiceInterface  $communicationService
    ): void
    {
        $authentication = $authenticationService->getById($this->authenticationId);
        $triggerIdentifier = $triggerService->getNameByHookData(current($this->hookData));
        $triggerModel = $triggerService->getTriggerByName($triggerIdentifier);

        $flowModel = $flowService->getByModule(
            $authentication->user_id,
            $triggerModel->id,
            $authentication->application_id
        );
        $communicationService->publishCoreFlowResolver(
            [
                'userId' => $authentication->user_id,
                'data' => $this->hookData,
                'triggerId' => $triggerModel->id,
                'flowId' => $flowModel->id,
                'applicationId' => $authentication->application_id
            ]
        );


    }
}
