<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function user()
    {
        $this->belongsTo('App\Models\User');
    }

    public function method()
    {
        $this->belongsTo('App\Models\Method');
    }
}
