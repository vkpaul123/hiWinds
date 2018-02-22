<?php

namespace App\Http\Controllers;

use App\Masterlog;
use App\Sensor;
use App\Windmill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use SoapBox\Formatter\Formatter;


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

        $address = Windmill::find($windmill_id)->address()->get()->first();
        $sensor->region = $address->region;
        $sensor->district = $address->district;
        $sensor->state = $address->state;

        $sensor->save();

        $masterlog = new Masterlog;
        $masterlog->windmill_id = $windmill_id;
        $masterlog->current = $current;
        $masterlog->voltage = $voltage;
        $masterlog->power = $current * $voltage;
        $masterlog->humidity = $humidity;
        $masterlog->temperature = $temperature;
        $masterlog->save();

        $allWindMills = Sensor::where('windmill_id', $windmill_id);
    	if($allWindMills->get()->count() == 72) {
            $last100Mills = $allWindMills->get();
            $last100 = $last100Mills->toArray();

            $windmill = Windmill::find($windmill_id);
            $user_id = $windmill->user()->get()->first()->id;

            $formatter = Formatter::make($last100, Formatter::ARR);

            $csv = $formatter->toCsv();

            Storage::disk('s3')->put('users/'.$user_id.'/last100/'.$windmill_id.'.csv', (string)$csv, 'public');

            $link = Storage::disk('s3')->url('users/'.$user_id.'/last100/'.$windmill_id.'.csv');

            $windmill->csvfile = $link;

            $windmill->save();

            foreach ($last100Mills as $mill) {
                Sensor::find($mill->id)->delete();
            }
        }

        return "Stored";
    }
}
