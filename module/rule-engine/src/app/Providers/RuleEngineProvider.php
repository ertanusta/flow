<?php

namespace RuleEngine\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use RuleEngine\Services\RuleEngine;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\Adapter\RedisAdapter;
use Symfony\Component\ExpressionLanguage\ExpressionFunctionProviderInterface;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

class RuleEngineProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/rule-engine.php' => config_path('rule-engine.php'),
        ]);
    }

    public function register()
    {
        $this->bindEngine();
        if ($this->app->runningInConsole()) {
            $this->bindEngine();
        }
    }

    private function bindEngine()
    {
        $expLanguageProvider = [...$this->app->tagged('expression-language-provider')];
        foreach ($expLanguageProvider as $key => $value) {
            if (!($value instanceof ExpressionFunctionProviderInterface)) {
                unset($expLanguageProvider[$key]);
            }
        }

        $this->app->bind('rule-engine', function ($app) use ($expLanguageProvider) {
            $expressionLanguage = new ExpressionLanguage(
                $this->createCache(),
                $expLanguageProvider);
            return new RuleEngine($expressionLanguage);
        });
    }

    private function createCache()
    {
        $cacheType = Config::get('rule-engine.cache_driver');
        if ($cacheType === "file") {
            $config = Config::get('rule-engine.file');
            return new FilesystemAdapter(
                $config['namespace'],
                $config['life_time'],
                $config['path']
            );
        }

        if ($cacheType === "redis") {
            $config = Config::get('rule-engine.redis');

            return new RedisAdapter(
                RedisAdapter::createConnection(
                    "redis://" .
                    (isset($config['username']) ? $config['username'] . ":" : "") .
                    (isset($config['password']) ? $config['password'] . "@" : "") .
                    (isset($config['host']) ? $config['host'] . ":" : "") .
                    (isset($config['port']) ? $config['port'] . "/" : "") .
                    (isset($config['database']) ? $config['database'] : "")
                ),
                $config['namespace'],
                $config['life_time']
            );
        }
        return null;
    }
}
