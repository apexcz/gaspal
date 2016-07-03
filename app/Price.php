<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    //
    protected $table='prices';

    protected $fillable =['product','cost','station_id'];

    public function station(){
        return $this->belongsTo('App\Station');
    }
}
