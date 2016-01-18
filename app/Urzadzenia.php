<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Urzadzenia extends Model
{
    protected $table = 'urzadzenie';
    public $timestamps = false;

    public function typ()
    {
        return $this->belongsTo('App\UrzadzeniaTyp', 'urzadzenie_typ_id', 'ID');
    }

    public function asortyment()
    {
        return $this->belongsTo('App\Asortyment', 'asortyment_id', 'ID');
    }
}
