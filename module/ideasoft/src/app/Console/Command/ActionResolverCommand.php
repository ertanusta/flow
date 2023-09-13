<?php

namespace Ideasoft\Console\Command;

use Ideasoft\Contracts\Services\CommunicationServiceInterface;
use Ideasoft\Jobs\ActionResolverJob;
use Illuminate\Console\Command;

class ActionResolverCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ideasoft:action-resolver-comand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    private CommunicationServiceInterface $communicationService;

    public function __construct(CommunicationServiceInterface $communicationService)
    {
        parent::__construct();
        $this->communicationService = $communicationService;
    }

    public function handle()
    {
        $this->communicationService->subscriberActionResolver(function (string $message) {
            $data = json_decode($message, true, 512, JSON_THROW_ON_ERROR);
            ActionResolverJob::dispatch(
                $data['flowId'],
                $data['context'],
                $data['triggerData'],
                $data['userId'],
            );
        });
    }
}
