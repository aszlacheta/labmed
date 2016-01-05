<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialBiologiczny extends Model
{
    protected $table = 'material_biologiczny';

    public function materialBiologicznyTyp()
    {
        return $this->hasOne('App\MaterialBiologicznyTyp', 'ID');
    }
}
