<?php

namespace Ideasoft\Console\Command;

use Ideasoft\Contracts\Services\ActionServiceInterface;
use Ideasoft\Contracts\Services\CommunicationServiceInterface;
use Illuminate\Console\Command;
use RuleEngine\Facades\RuleEngine;

class ActionResolverComand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ideasoft:action-resolver-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    private CommunicationServiceInterface $communicationService;
    private ActionServiceInterface $actionService;

    public function __construct(
        CommunicationServiceInterface $communicationService,
        ActionServiceInterface $actionService
    )
    {
        $this->communicationService = $communicationService;
        $this->actionService = $actionService;
        parent::__construct();
    }

    public function handle()
    {
           $this->communicationService->subscribeActionResolver(
               function (array $messages){
                   foreach ($messages as $message){
                       $data = json_decode($message, true, 512, JSON_THROW_ON_ERROR);
                       $action = $this->actionService->getActionById($data['actionId']);

                   }

                    /**
                     * Hangi action olduğunu bul
                     * Action a ait job ı bul
                     * Dataları job a gönder
                     */
               }
           );
    }
}
