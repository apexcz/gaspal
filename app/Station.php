<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    //
    protected  $table = 'stations';
    protected $fillable = ['bus_stop','city','state','company_id','phone'];

    public function company(){
        return $this->belongsTo('App\Company');
    }

    public function prices()
    {
        return $this->hasMany('App\Price');
    }

    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }
}
