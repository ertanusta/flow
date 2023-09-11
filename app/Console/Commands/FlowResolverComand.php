<?php

namespace App\Console\Commands;

use App\Jobs\FlowResolverJobs;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

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

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Redis::connection('core')->subscribe(['flow-resolve'], function (string $message) {
            $data = json_decode($message, true, 512, JSON_THROW_ON_ERROR);
            FlowResolverJobs::dispatch(
                $data['userId'],
                $data['flowId'],
                $data['applicationId'],
                $data['triggerId'],
                $data['data']
            );
        });
    }
}
