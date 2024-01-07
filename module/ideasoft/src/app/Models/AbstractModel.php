<?php

namespace Ideasoft\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

abstract class AbstractModel extends Model
{
    public function getConnectionName()
    {
        return parent::getConnectionName();
       // return Config::get('ideasoft.connection.ideasoft');
    }
}
