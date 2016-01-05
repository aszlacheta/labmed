<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Odczynnik extends Model
{
    protected $table = 'odczynnik';

    public function typ()
    {
        return $this->belongsTo('App\OdczynnikiTyp', 'odczynnik_typ_id', 'ID');
    }

    public function asortyment()
    {
        return $this->belongsTo('App\Asortyment', 'asortyment_id', 'ID');
    }
}
