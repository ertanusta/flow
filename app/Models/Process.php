<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Process extends AbstractModels
{
    use HasFactory;

    protected $fillable = [
        'process_id',
        'authentication_id',
        'flow_id',
        'flow_name',
        'flow_status',
        'trigger_id',
        'trigger_name',
        'trigger_application_id',
        'trigger_application_name',
        'user_id',
        'condition',
        'condition_id',
        'action_context_id',
        'action_id',
        'action_name',
        'action_application_id',
        'action_application_name',
        'cost',
        'avaible_credit',
        'message',
        'action_context',
        'transaction_id',
        'status',
        'other',
    ];

    protected $casts = [
        'other' => 'array'
    ];
}
