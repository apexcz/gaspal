<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    //
    protected $table='bookmarks';

    protected $fillable =['user_id','station_id'];

    protected $hidden = ['score'];

    public function station(){
        return $this->belongsTo('App\Station');
    }
}
