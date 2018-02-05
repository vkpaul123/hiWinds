<?php

namespace App\Http\Controllers;

use App\Sensor;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function store($windmill_id, $current , $voltage, $humidity, $temperature) {
    	$sensor = new Sensor;

    	$sensor->windmill_id = $windmill_id;
    	$sensor->current = $current;
    	$sensor->voltage = $voltage;
    	$sensor->power = $current * $voltage;
    	$sensor->humidity = $humidity;
    	$sensor->temperature = $temperature;

    	$sensor->save();
    }
}
