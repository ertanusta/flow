<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActionContext extends CoreModels
{
    use HasFactory;

    protected $table = "action_contexts";

    protected $fillable = [
        'application_id',
        'module_id',
        'context',
        'trigger_context_id',
        'name'
    ];

    public function getTriggerContext()
    {
        return $this->hasOne(
            TriggerContext::class,
            'trigger_context_id',
            'id');
    }

    public function getFlow()
    {
        return $this->getTriggerContext()->first()->getFlow();
    }
}
