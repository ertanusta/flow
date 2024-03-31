<?php

namespace App\Services\App\Pipeline\FlowCreator;

use App\Contracts\Services\CommunicationServiceInterface;
use App\Contracts\Services\Pipeline\FlowCreator\FlowCreatorInterface;
use App\Exceptions\HandlerException;
use App\Models\Application;
use App\Models\Flow;
use App\Models\User;

class FlowCreatorHandler implements FlowCreatorInterface
{

    private CommunicationServiceInterface $communicationService;

    public function __construct(CommunicationServiceInterface $communicationService)
    {
        $this->communicationService = $communicationService;
    }

    public function handle(FlowCreatorMessage $message, \Closure $next)
    {
        /** @var User $user */
        $user = User::query()->where('id', '=', $message->content['userId'])->firstOrFail();
        $message->user = $user;
        /** @var Application $application */
        $application = Application::query()->where('id', '=', $message->content['triggerApplicationId'])->firstOrFail();
        $message->application = $application;

        try {
            $applicationTriggerResponse = $this->communicationService
                ->getApplicationTriggerById($application, $message->content['triggerId']);
        } catch (\Exception $exception) {
            throw new HandlerException($exception->getMessage(), $exception->getCode());
        }
        $message->triggerContent = $applicationTriggerResponse['data'];
        $flow = Flow::create([
            'name' => $message->getFlowName(),
            'user_id' => $message->user->id,
            'application_id' => $message->application->id,
            'status' => true,
            'working_count' => 0,
            'trigger_id' => $message->triggerContent['id'],
            'trigger_name' => $message->triggerContent['name']
        ]);
        $message->flow = $flow;
        $next($message);
    }
}
