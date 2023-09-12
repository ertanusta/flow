<?php

namespace RuleEngine\Providers;

use Illuminate\Support\ServiceProvider;
use RuleEngine\Services\RuleEngine;
use Symfony\Component\ExpressionLanguage\ExpressionFunctionProviderInterface;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

class RuleEngineProvider extends ServiceProvider
{
    public function register()
    {
        $expLanguageProvider = [...$this->app->tagged('expression-language-provider')];
        foreach ($expLanguageProvider as $key => $value) {
            if (!($value instanceof ExpressionFunctionProviderInterface)) {
                unset($expLanguageProvider[$key]);
            }
        }
        $this->app->bind('rule-engine', function ($app) use ($expLanguageProvider) {
            $expressionLanguage = new ExpressionLanguage(
                null,
                $expLanguageProvider);
            return new RuleEngine($expressionLanguage);
        });
        $this->inConsole();
    }

    private function inConsole()
    {
        if ($this->app->runningInConsole()) {
            $expLanguageProvider = [...$this->app->tagged('expression-language-provider')];
            foreach ($expLanguageProvider as $key => $value) {
                if (!($value instanceof ExpressionFunctionProviderInterface)) {
                    unset($expLanguageProvider[$key]);
                }
            }
            $this->app->bind('rule-engine', function ($app) use ($expLanguageProvider) {
                $expressionLanguage = new ExpressionLanguage(
                    null,
                    $expLanguageProvider);
                return new RuleEngine($expressionLanguage);
            });
        }
    }
}
