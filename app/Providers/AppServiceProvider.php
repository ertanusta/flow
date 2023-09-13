<?php

namespace App\Providers;

use App\Contracts\Services\CommunicationServiceInterface;
use App\Services\CommunicationService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CommunicationServiceInterface::class, function () {
            return new CommunicationService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
