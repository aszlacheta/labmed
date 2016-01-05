<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Urzadzenia extends Model
{
    protected $table = 'urzadzenie';

    public function urzadzeniaTyp()
    {
        return $this->hasOne('App\UrzadzeniaTyp', 'ID');
    }

    public function asortyment()
    {
        return $this->hasOne('App\Asortyment', 'ID');
    }
}
