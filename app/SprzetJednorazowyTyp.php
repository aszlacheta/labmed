<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SprzetJednorazowyTyp extends Model
{
    protected $table = 'sprzet_jednorazowy_typ';

    public function sprzetJednorazowy()
    {
        return $this->belongsTo('App\SprzetJednorazowy', 'sprzet_jedn_typ');
    }

    public function sprzetJednorazowyPodtyp()
    {
        return $this->belongsTo('App\SprzetJednorazowyPodTyp', 'sprzet_jedn_typ');
    }
}
