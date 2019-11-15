<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    public function kartu(){
		return $this->belongsTo('App\Kartu','kartu_id');
    }
    
    public function inventaris(){
		return $this->belongsTo('App\Inventaris','inventaris_id');
	}
}
