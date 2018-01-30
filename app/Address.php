<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function user() {
    	return $this->hasMany(User::class);
    }
}
