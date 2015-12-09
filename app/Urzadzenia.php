<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Urzadzenia extends Model
{
    protected $table = 'urzadzenia';

    public function urzadzeniaTyp()
    {
        return $this->hasOne('App\UrzadzeniaTyp', 'id');
    }

    public function asortyment()
    {
        return $this->hasOne('App\Asortyment', 'id');
    }
}
