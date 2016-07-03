<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //
    protected $table='notifications';

    protected $fillable =['user_id','station_id','product','price_direction','target_price'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
