<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialBiologiczny extends Model
{
    protected $table = 'material_biologiczny';

    public function typ()
    {
        return $this->belongsTo('App\MaterialBiologicznyTyp', 'material_biologiczny_typ_id', 'ID');
    }

    public function asortyment()
    {
        return $this->belongsTo('App\Asortyment', 'asortyment_id', 'ID');
    }
}
