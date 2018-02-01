<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Windmill extends Model
{
    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function address() {
    	return $this->belongsTo(Address::class);
    }

    public function sensor() {
    	return $this->hasMany(Sensor::class);
    }
}
