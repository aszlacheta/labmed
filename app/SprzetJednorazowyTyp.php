<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SprzetJednorazowyTyp extends Model
{
    protected $table = 'sprzet_jednorazowy_typ';

    public function sprzetJednorazowy()
    {
        return $this->belongsTo('App\SprzetJednorazowy', 'typ');
    }
}
