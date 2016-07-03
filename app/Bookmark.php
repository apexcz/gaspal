<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    //
    protected $table='bookmarks';

    protected $fillable =['user_id','station_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
