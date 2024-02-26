<?php

namespace Ideasoft\Providers;

use Ideasoft\Client\Client;
use Ideasoft\Console\Command\MigrationsCommand;
use Ideasoft\Contracts\Client\ClientInterface;
use Ideasoft\Contracts\Repository\ActionRepositoryInterface;
use Ideasoft\Contracts\Repository\AuthenticationRepositoryInterface;
use Ideasoft\Contracts\Services\ActionServiceInterface;
use Ideasoft\Contracts\Services\AuthenticationServiceInterface;
use Ideasoft\Contracts\Services\CommunicationServiceInterface;
use Ideasoft\Repository\ActionRepository;
use Ideasoft\Repository\AuthenticationRepository;
use Ideasoft\Services\ActionService;
use Ideasoft\Services\AuthenticationService;
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
        $this->loadRoutesFrom(__DIR__ . '../../../routes/web.php');
    }

    public function register()
    {
        parent::register();
        $this->registerRepository();
        $this->registerServices();
    }
    private function registerRepository()
    {
        $this->app->bind(ActionRepositoryInterface::class, function () {
            return new ActionRepository();
        });
        $this->app->bind(AuthenticationRepositoryInterface::class, function () {
            return new AuthenticationRepository();
        });
    }
    private function registerServices()
    {
        $this->app->bind(ActionServiceInterface::class, function ($app) {
            return new ActionService($app->make(ActionRepositoryInterface::class));
        });
        $this->app->bind(AuthenticationServiceInterface::class, function ($app) {
            return new AuthenticationService($app->make(AuthenticationRepositoryInterface::class));
        });
        $this->app->bind(CommunicationServiceInterface::class, function () {
            return new CommunicationService();
        });
        $this->app->bind(ClientInterface::class,function (){
           return new Client();
        });
    }
}
