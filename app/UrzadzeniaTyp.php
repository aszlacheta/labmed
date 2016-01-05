<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UrzadzeniaTyp extends Model
{
    protected $table = 'urzadzenie_typ';

    public function urzadzenia()
    {
        return $this->belongsTo('App\Urzadzenia', 'urzadzenie_typ_id');
    }
}
