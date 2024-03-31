<?php

namespace App\Services\App\Pipeline\FlowCreator;

use App\Contracts\Services\CommunicationServiceInterface;
use App\Contracts\Services\Pipeline\FlowCreator\FlowCreatorInterface;
use App\Exceptions\HandlerException;
use App\Models\ActionContext;
use App\Models\Application;

class ActionContextCreatorHandler implements FlowCreatorInterface
{

    private CommunicationServiceInterface $communicationService;

    public function __construct(CommunicationServiceInterface $communicationService)
    {
        $this->communicationService = $communicationService;
    }

    public function handle(FlowCreatorMessage $message, \Closure $next)
    {
        /** @var Application $application */
        $application = Application::query()->where('id', $message->content['actionApplicationId'])->firstOrFail();

        try {
            $applicationActionResponse = $this->communicationService
                ->getApplicationActionById($application, $message->content['actionId']);
        } catch (\Exception $exception) {
            dd($exception);
            throw new HandlerException($exception->getMessage(), $exception->getCode());
        }

        $message->actionContent = $applicationActionResponse['data'];
        $actionContext = ActionContext::create([
            'context' => $message->content['context'],
            'condition_id' => $message->condition->id,
            'application_id' => $application->id,
            'application_name' => $application->name,
            'action_id' => $message->actionContent['id'],
            'action_name' => $message->actionContent['name']
        ]);
    }
}
