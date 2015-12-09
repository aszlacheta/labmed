<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temperatura extends Model
{
    protected $table = 'temperatura';

    public function odczynniki()
    {
        return $this->belongsTo('App\Odczynnik', 'temperatura_fk');
    }
}
