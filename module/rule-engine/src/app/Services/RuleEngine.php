<?php

namespace RuleEngine\Services;

use RuleEngine\Contracts\RuleEngineInterface;
use Symfony\Component\ExpressionLanguage\Expression;
use Symfony\Component\ExpressionLanguage\ExpressionFunction;
use Symfony\Component\ExpressionLanguage\ExpressionFunctionProviderInterface;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;
use Symfony\Component\ExpressionLanguage\ParsedExpression;

class RuleEngine implements RuleEngineInterface
{
    private ExpressionLanguage $expressionLanguage;

    public function __construct(ExpressionLanguage $expressionLanguage)
    {
        $this->expressionLanguage = $expressionLanguage;
    }

    public function compile(Expression|string $expression, array $names = []): string
    {
        return $this->expressionLanguage->compile($expression, $names);
    }

    public function evaluate(Expression|string $expression, array $values = []): mixed
    {
        return $this->expressionLanguage->evaluate($expression, $values);
    }

    public function parse(Expression|string $expression, array $names): ParsedExpression
    {
        return $this->expressionLanguage->parse($expression, $names);
    }

    public function lint(Expression|string $expression, ?array $names): void
    {
        $this->expressionLanguage->lint($expression, $names);
    }

    public function register(string $name, callable $compiler, callable $evaluator): void
    {
        $this->expressionLanguage->register($name, $compiler, $evaluator);
    }

    public function addFunction(ExpressionFunction $function): void
    {
        $this->expressionLanguage->addFunction($function);
    }

    public function registerProvider(ExpressionFunctionProviderInterface $provider): void
    {
        $this->expressionLanguage->registerProvider($provider);
    }
}
