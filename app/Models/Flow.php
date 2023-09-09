<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flow extends CoreModels
{
    use HasFactory;

    protected $table = "flows";

    protected $fillable = [
        'trigger_module',
        'trigger_module_id',
        'name',
        'user_id',
        'application_id'
    ];

    public function getTriggerConditions()
    {
        return $this->hasMany(
            TriggerContext::class,
            'flow_id',
            'id'
        );
    }
}
