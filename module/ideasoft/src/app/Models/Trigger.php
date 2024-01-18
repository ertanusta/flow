<?php

namespace Ideasoft\Models;

use Ideasoft\Models\AbstractModel;

/**
 * class Trigger
 */
class Trigger extends AbstractModel
{
    protected $table = 'triggers';
    protected $fillable = [
        'name',
        'application_id',
        'identifier',
        'fields',
    ];
    protected $casts = [
        'fields' => 'array'
    ];
}
