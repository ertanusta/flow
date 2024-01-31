<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActionContext extends AbstractModels
{
    use HasFactory;

    protected $table = "action_contexts";

    protected $fillable = [
        'context',
        'condition_id',
        'application_id',
        'application_name',
        'action_id',
        'action_name'
    ];
}
