<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UrzadzeniaTyp extends Model
{
    protected $table = 'urzadzenia_typ';

    public function urzadzenia()
    {
        return $this->belongsTo('App\Urzadzenia', 'urzadzenia_typ_id');
    }
}
