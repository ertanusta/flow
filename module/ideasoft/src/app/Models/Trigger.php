<?php

namespace Ideasoft\Models;

use Ideasoft\Models\AbstractModel;

class Trigger extends AbstractModel
{
    protected $table = 'triggers';
    protected $fillable = [
        'name',
        'class',
        'context'
    ];
    protected $casts = [
        'context' => 'array'
    ];
}
