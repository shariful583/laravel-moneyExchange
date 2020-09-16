<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Method extends Model
{
    public function sellRate()
    {
        return $this->hasOne('App\Models\Sellrate');
    }

    public function buyRate()
    {
       return $this->hasOne('App\Models\Buyrate');
    }

    public function transaction()
    {
        return $this->hasMany('App\Models\Transaction');
    }
}
