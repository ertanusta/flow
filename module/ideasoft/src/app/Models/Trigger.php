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
        'identifier',
        'class',
        'context'
    ];
    protected $casts = [
        'context' => 'array'
    ];
}
