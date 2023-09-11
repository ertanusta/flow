<?php

namespace Ideasoft\Models;

class Action extends AbstractModel
{
    protected $table = 'actions';
    protected $fillable = [
        'name',
        'class',
        'context',
        'identifier'
    ];
    protected $casts = [
        'context' => 'array'
    ];
}
