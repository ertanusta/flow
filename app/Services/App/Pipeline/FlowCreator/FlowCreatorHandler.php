<?php

namespace App\Services\App\Pipeline\FlowCreator;

use App\Contracts\Services\CommunicationServiceInterface;
use App\Contracts\Services\Pipeline\FlowCreator\FlowCreatorInterface;
use App\Models\Application;
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
        $application = Application::query()->where('id', '=', $message->content['applicationId'])->firstOrFail();
        $message->application = $application;

        //todo: triggerı id ye göre bulma rotasını ekle applicationa
        $applicationTriggerResponse = $this->communicationService
            ->getApplicationTriggerById($application, $message->content['triggerId']);
        // burada response var mı yok mu bir bak var ise ona göre message objesine set et
        $next($message);
    }
}
