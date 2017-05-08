<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    public function schedule()
    {
    	return $this->belongsTo('App\Schedule');
    }

    public function journey()
    {
    	return $this->belongsTo('App\Journey');
    }

    public function adminuser()
    {
    	return $this->belongsToMany('App\AdminUser');
    }

}
