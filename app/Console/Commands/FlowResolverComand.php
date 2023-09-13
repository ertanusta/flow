<?php

namespace App\Console\Commands;

use App\Contracts\Services\CommunicationServiceInterface;
use App\Jobs\FlowResolverJob;
use Illuminate\Console\Command;

class FlowResolverComand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'core:flow-resolver-comand';

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
        $this->communicationService->subscriberFlowResolver(
            function (string $message) {
                $data = json_decode($message, true, 512, JSON_THROW_ON_ERROR);
                FlowResolverJob::dispatch(
                    $data['userId'],
                    $data['flowId'],
                    $data['applicationId'],
                    $data['triggerId'],
                    $data['data']
                );
            }
        );

    }
}
