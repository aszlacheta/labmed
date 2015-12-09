<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Odczynnik extends Model
{
    protected $table = 'odczynniki';

    public function odczynnikiTyp()
    {
        return $this->hasOne('App\OdczynnikiTyp', 'id');
    }

    public function temperatura()
    {
        return $this->hasOne('App\Temperatura', 'id');
    }
}
