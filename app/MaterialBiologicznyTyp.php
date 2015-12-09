<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialBiologicznyTyp extends Model
{
    protected $table = 'material_biologiczny_typ';

    public function materialBiologiczny()
    {
        return $this->belongsTo('App\MaterialBiologiczny', 'fk_typ');
    }
}
