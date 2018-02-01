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
    	$sensors = Windmill::find($id)->sensor()->get();

    	return view('companyPages.windmill.windmillLog')
    	->with(compact('sensors'))
    	->with(compact('id'));
    }
}
