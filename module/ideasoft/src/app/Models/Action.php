<?php

namespace Ideasoft\Models;

class Action extends AbstractModel
{
    protected $table = 'actions';
    protected $fillable = [
        'name',
        'class',
        'context'
    ];
    protected $casts = [
        'context' => 'array'
    ];
}
