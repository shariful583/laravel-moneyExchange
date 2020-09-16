<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sellrate extends Model
{
    public function method()
    {
        return $this->belongsTo('App\Models\Method');
    }
}
