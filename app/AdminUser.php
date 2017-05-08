<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    public function bus()
    {
    	return $this->belongsToMany('App\Bus');
    }
}
