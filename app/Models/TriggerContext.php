<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class TriggerContext extends CoreModels
{
    use HasFactory;

    protected $table = "trigger_contexts";

    protected $fillable = [
        'module_id',
        'application_id',
        'flow_id',
        'condition',
        'name'
    ];

    public function getFlow()
    {
        return $this->hasOne(
            Flow::class,
            'flow_id',
            'id'
        );
    }

    public function getActionContext()
    {
        return $this->hasMany(
            ActionContext::class,
            'trigger_context_id',
            'id'
        );
    }
}
