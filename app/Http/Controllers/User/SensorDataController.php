<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Windmill;
use Illuminate\Http\Request;

class SensorDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showWindmillLog($id) {
        $sensors = Windmill::find($id)->masterlog();
        $graphs = $sensors
                    ->orderBy('id', 'desc')
                    ->get()
                    ->take(2)
                    ->reverse();

    	$sensors = $sensors->get();

    	return view('companyPages.windmill.windmillLog')
    	->with(compact('sensors'))
        ->with(compact('graphs'))
    	->with(compact('id'));
    }

    public function loadGraph($id) {
        $graphs = Windmill::find($id)
                    ->masterlog()
                    ->orderBy('id', 'desc')
                    ->get()
                    ->take(100)
                    ->reverse();

        return response()->json($graphs);
    }
}
