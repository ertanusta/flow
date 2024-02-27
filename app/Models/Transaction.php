<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends AbstractModels
{
    use HasFactory;

    protected $table = "transactions";

    protected $fillable = [
        "process_id",
        "amount",
        "process",
        "user_id"
    ];
}
