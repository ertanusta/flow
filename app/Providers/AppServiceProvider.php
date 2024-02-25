<?php

namespace App\Providers;

use App\Contracts\Services\CommunicationServiceInterface;
use App\Contracts\Services\Internal\CreditServiceInterface;
use App\Contracts\Services\Internal\FlowServiceInterface;
use App\Services\CommunicationService;
use App\Services\Internal\CreditService;
use App\Services\Internal\FlowService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
       $this->registerInternalServices();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    private function registerInternalServices()
    {
        $this->app->bind(CommunicationServiceInterface::class, function () {
            return new CommunicationService();
        });
        $this->app->bind(CreditServiceInterface::class, function () {
            return new CreditService();
        });
        $this->app->bind(FlowServiceInterface::class, function () {
            return new FlowService();
        });
    }
}
