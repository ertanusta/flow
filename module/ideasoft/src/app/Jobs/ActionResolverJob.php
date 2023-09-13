<?php

namespace Ideasoft\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ActionResolverJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $connection = "ideasoft_queue";

    public $queue = "ideasoft_action_execute";

    private $flowId;
    private $context;
    private $triggerData;
    private $userId;

    public function __construct($flowId, $context, $triggerData, $userId)
    {
        $this->flowId = $flowId;
        $this->context = $context;
        $this->triggerData = $triggerData;
        $this->userId = $userId;
    }

    public function handle()
    {
        /**
         * authenticationId yi çek
         * Burada Flow engine ile actionı doldurucaz context ile
         * sonrasında action ı bir şekilde göndermemiz gerekiyor
         *      Burada her action için bir jobs açılıp
         *      Class içerisine ilgilenilecek data verilir ve işlem gerçekleşir
         */
    }
}
