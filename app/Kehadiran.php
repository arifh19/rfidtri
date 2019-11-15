<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    public function kartu(){
		return $this->belongsTo('App\Kartu','kartu_id');
    }
}
