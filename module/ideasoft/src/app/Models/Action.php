<?php

namespace Ideasoft\Models;

/**
 * @property $name
 * @property $identifier
 * @property array $fields
 * @property $cost
 */
class Action extends AbstractModel
{
    protected $table = 'ideasoft_actions';
    protected $fillable = [
        'name',
        'identifier',
        'fields',
        'cost'
    ];
    protected $casts = [
        'fields' => 'array'
    ];
}
