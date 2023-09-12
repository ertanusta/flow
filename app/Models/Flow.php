<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class Flow extends CoreModels
{
    use HasFactory;

    protected $table = "flows";

    protected $fillable = [
        'trigger_module_id',
        'name',
        'user_id',
        'application_id',
        'status',
        'working_count'
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
