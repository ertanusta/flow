<?php

namespace RuleEngine\Contracts;

use Symfony\Component\ExpressionLanguage\Expression;
use Symfony\Component\ExpressionLanguage\ExpressionFunction;
use Symfony\Component\ExpressionLanguage\ExpressionFunctionProviderInterface;
use Symfony\Component\ExpressionLanguage\ParsedExpression;

interface RuleEngineInterface
{
    public function compile(Expression|string $expression, array $names = []): string;

    public function evaluate(Expression|string $expression, array $values = []): mixed;

    public function parse(Expression|string $expression, array $names): ParsedExpression;

    public function lint(Expression|string $expression, ?array $names): void;

    public function register(string $name, callable $compiler, callable $evaluator): void;

    public function addFunction(ExpressionFunction $function): void;

    public function registerProvider(ExpressionFunctionProviderInterface $provider): void;
}
