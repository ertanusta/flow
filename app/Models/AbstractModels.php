<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

abstract class AbstractModels extends Model
{

    public function getConnectionName()
    {
        return Config::get('database.connection.core');
    }
}
