<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SprzetJednorazowy extends Model
{
    protected $table = 'sprzet_jedn';
    public $timestamps = false;

    public function typ()
    {
        return $this->belongsTo('App\SprzetJednorazowyTyp', 'sprzet_jedn_typ_id', 'ID');
    }

    public function podtyp()
    {
        return $this->belongsTo('App\SprzetJednorazowyPodtyp', 'sprzet_jedn_podtyp_id', 'ID');
    }

    public function asortyment()
    {
        return $this->belongsTo('App\Asortyment', 'asortyment_id', 'ID');
    }
}
