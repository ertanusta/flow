<?php

namespace Ideasoft\Models;

class Action extends AbstractModel
{
    protected $table = 'actions';
    protected $fillable = [
        'name',
        'application_id',
        'identifier',
        'fields',
        'cost'
    ];
    protected $casts = [
        'fields' => 'array'
    ];
}
