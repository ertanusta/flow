<?php

namespace Ideasoft\Providers;

use Ideasoft\Console\Command\MigrationsCommand;
use Ideasoft\Contracts\Services\CommunicationServiceInterface;
use Ideasoft\Services\CommunicationService;
use Illuminate\Support\ServiceProvider;

class IdeasoftServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/database.php', "database.connections.ideasoft");
        if ($this->app->runningInConsole()) {
            $this->commands(
                commands: [
                    MigrationsCommand::class,
                ],
            );
        }
        $this->loadRoutesFrom(__DIR__.'../../../routes/web.php');
    }

    public function register()
    {
        parent::register();
        $this->app->bind(CommunicationServiceInterface::class, function () {
            return new CommunicationService();
        });
    }
}
