<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class Flow extends AbstractModels
{
    use HasFactory;

    protected $table = "flows";

    protected $fillable = [
        'name',
        'user_id',
        'application_id',
        'trigger_id',
        'trigger_name',
        'status',
        'working_count'
    ];
}
