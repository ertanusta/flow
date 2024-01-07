<?php

namespace Ideasoft\Console\Command;

use Illuminate\Console\Command;

class AccessTokenRefreshCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ideasoft:access-token:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "ideasoft'a ait authenticationları refresh eder";

    /**
     * Execute the console command.
     */
    public function handle()
    {
    // TODO: burayı hallet
        $this->info('Package migrations have been run.');
    }
}
