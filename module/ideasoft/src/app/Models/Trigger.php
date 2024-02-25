<?php

namespace Ideasoft\Models;


/**
 * class Trigger
 * @property integer $id
 * @property string $name
 * @property string $identifier
 * @property boolean $is_reader
 * @property array $fields
 */
class Trigger extends AbstractModel
{
    protected $table = 'ideasoft_triggers';
    protected $fillable = [
        'name',
        'identifier',
        'fields',
        'is_reader'
    ];
    protected $casts = [
        'fields' => 'array'
    ];
}
