<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SprzetJednorazowy extends Model
{
    protected $table = 'sprzet_jednorazowy';

    public function sprzetJednorazowyTyp()
    {
        return $this->hasOne('App\SprzetJednorazowyTyp', 'id');
    }

    public function sprzetJednorazowyPodtypp()
    {
        return $this->hasOne('App\SprzetJednorazowyPodtyp', 'id');
    }

    public function asortyment()
    {
        return $this->hasOne('App\Asortyment', 'id');
    }
}
