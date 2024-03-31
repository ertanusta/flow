<?php

namespace App\Providers;

use App\Contracts\Repository\ApplicationRepositoryInterface;
use App\Contracts\Services\App\DashboardServiceInterface;
use App\Contracts\Services\App\FlowServiceInterface as AppFlowServiceInterface;
use App\Contracts\Services\CommunicationServiceInterface;
use App\Contracts\Services\Internal\ActionContextServiceInterface;
use App\Contracts\Services\Internal\ConditionServceInterface;
use App\Contracts\Services\Internal\CreditServiceInterface;
use App\Contracts\Services\Internal\FlowServiceInterface;
use App\Repository\ApplicationRepository;
use App\Services\App\DashboardService;
use App\Services\App\FlowService as AppFlowService;
use App\Services\CommunicationService;
use App\Services\Internal\ActionContextService;
use App\Services\Internal\ConditionService;
use App\Services\Internal\CreditService;
use App\Services\Internal\FlowService;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->registerAppServices();
        $this->registerInternalServices();
        $this->registerRepositoryServices();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    private function registerRepositoryServices()
    {
        $this->app->bind(ApplicationRepositoryInterface::class, function () {
            return new ApplicationRepository();
        });
    }

    private function registerAppServices()
    {
        $this->app->bind(DashboardServiceInterface::class, function () {
            return new DashboardService();
        });
        $this->app->bind(AppFlowServiceInterface::class, function () {
            return new AppFlowService($this->app->make(Pipeline::class));
        });
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
        $this->app->bind(ConditionServceInterface::class, function () {
            return new ConditionService();
        });
        $this->app->bind(ActionContextServiceInterface::class, function () {
            return new ActionContextService();
        });
    }
}
