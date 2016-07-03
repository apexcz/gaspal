<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $table='companies';

    protected $fillable = ['name','phone','others'];

    public function stations()
    {
        return $this->hasMany('App\Station');
    }
}
