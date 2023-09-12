<?php

namespace RuleEngine\Facades;

use Illuminate\Support\Facades\Facade;
use Symfony\Component\ExpressionLanguage\Expression;
use Symfony\Component\ExpressionLanguage\ExpressionFunction;
use Symfony\Component\ExpressionLanguage\ExpressionFunctionProviderInterface;
use Symfony\Component\ExpressionLanguage\ParsedExpression;

/**
 * @method static string compile(Expression|string $expression, array $names = [])
 * @method static mixed evaluate(Expression|string $expression, array $values = [])
 * @method static ParsedExpression parse(Expression|string $expression, array $names)
 * @method static void lint(Expression|string $expression, ?array $names)
 * @method static void register(string $name, callable $compiler, callable $evaluator)
 * @method static void addFunction(ExpressionFunction $function)
 * @method static void registerProvider(ExpressionFunctionProviderInterface $provider)
 */
class RuleEngine extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'rule-engine';
    }
}
