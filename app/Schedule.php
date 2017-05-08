<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public function bus()
    {
    	return $this->hasMany('App\Bus');
    }
}
