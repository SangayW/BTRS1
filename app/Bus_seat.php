<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus_seat extends Model
{
    public function bus()
    {
      return $this->belongsTo('App\Bus','bus_id','id');
    }
    public function seat()
    {
      return $this->belongsTo('App\SeatInformation','seat_id','id');
    }
}
