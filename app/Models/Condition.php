<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Condition extends AbstractModels
{
    use HasFactory;

    protected $table = "conditions";

    protected $fillable = [
        'flow_id',
        'condition'
    ];
}
