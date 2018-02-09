<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masterlog extends Model
{
    public function windmill() {
    	return $this->belongsTo(Windmill::class);
    }
}
