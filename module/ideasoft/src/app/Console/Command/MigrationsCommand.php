<?php

namespace Ideasoft\Console\Command;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class MigrationsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ideasoft:migrate {--fresh}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "ideasoft'a ait migrations dosyalarını çalıştırır";

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $command = "migrate";

        if ($this->option('fresh')){
            $command = "migrate:fresh";
        }
        $this->call($command, [
            '--path' => 'vendor/flow/ideasoft/src/database/migrations',
        ]);

        $this->info('Package migrations have been run.');
    }
}
