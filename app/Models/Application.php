<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends CoreModels
{
    use HasFactory;

    protected $table = "applications";

    protected $fillable = [
        'module_name',
        'name'
    ];

}
