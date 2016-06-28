<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notatki extends Model
{
	protected $table = 'notatki';
    public $timestamps = false;
    
    public function user_id()
    {
    	return $this->belongsTo('App\Users', 'user_id', 'ID');
    }
    
    public function user_email()
    {
    	return $this->belongsTo('App\Users', 'user_email', 'email');
    }


}
