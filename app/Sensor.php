<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    public function windmill() {
    	return $this->belongsTo(Windmill::class);
    }
}
