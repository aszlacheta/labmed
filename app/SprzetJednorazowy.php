<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SprzetJednorazowy extends Model
{
    protected $table = 'sprzet_jedn';

    public function sprzetJednorazowyTyp()
    {
        return $this->hasOne('App\SprzetJednorazowyTyp', 'ID');
    }

    public function sprzetJednorazowyPodtyp()
    {
        return $this->hasOne('App\SprzetJednorazowyPodtyp', 'ID');
    }

    public function asortyment()
    {
        return $this->hasOne('App\Asortyment', 'ID');
    }
}
