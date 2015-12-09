<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OdczynnikiTyp extends Model
{
    protected $table = 'odczynnik_typ';

    public function odczynniki()
    {
        return $this->belongsTo('App\Odczynnik', 'odczynnik_typ_fk');
    }
}
