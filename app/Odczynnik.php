<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Odczynnik extends Model
{
    protected $table = 'odczynnik';

    public function odczynnikiTyp()
    {
        return $this->hasOne('App\OdczynnikiTyp', 'ID');
    }
}
