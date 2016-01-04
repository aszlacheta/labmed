<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SprzetJednorazowyPodtyp extends Model
{
    protected $table = 'sprzet_jednorazowy_podtyp';

    public function sprzetJednorazowy()
    {
        return $this->belongsTo('App\SprzetJednorazowy', 'podtyp');
    }
}
