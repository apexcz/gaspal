<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    //
    protected $fillable = array('name', 'bus_stop','city','state','latitude','longitude','fuel_price','kerosine_price',
        'diesel_price');
}
