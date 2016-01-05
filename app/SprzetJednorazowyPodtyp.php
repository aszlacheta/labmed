<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SprzetJednorazowyPodtyp extends Model
{
    protected $table = 'sprzet_jedn_podtyp';

    public function sprzetJednorazowy()
    {
        return $this->belongsTo('App\SprzetJednorazowy', 'sprzet_jedn_typ_id');
    }
}
