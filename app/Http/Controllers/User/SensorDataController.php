<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Windmill;
use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class SensorDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showWindmillLog($id) {
        $windmill = Windmill::find($id);
        $sensors = $windmill->masterlog();
        $graphs = $sensors
                    ->orderBy('id', 'desc')
                    ->get()
                    // ->take(2)
                    ->reverse();

    	$sensors = $sensors->get();

        if(isset($windmill)) {
            $myCsvfile = $windmill->csvfile;
            if($myCsvfile != "")
                for ($i=0; $i < 5; $i++) { 
                    $process1 = new Process('pwd');
                    $process1->run();

                    $string = trim(preg_replace('/\s\s+/', ' ', $process1->getOutput()));

                    $process = new Process('python3 '.$string.'/pythonScripts/regression.py '.$myCsvfile);

                    $process->run();

                    if(!$process->isSuccessful())
                        throw new ProcessFailedException($process);
                        
                    $output = $process->getOutput();

                    $predictionPower = $this->get_string_between($output, "[", "]");

                    $windmill->predictionValue = $predictionPower;
                    $windmill->save();
                }
        }

    	return view('companyPages.windmill.windmillLog')
        ->with(compact('sensors'))
    	->with(compact('windmill'))
        ->with(compact('graphs'))
    	->with(compact('id'));
    }

    private function get_string_between($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

    public function loadGraph($id) {
        $graphs = Windmill::find($id)
                    ->masterlog()
                    ->orderBy('id', 'desc')
                    ->get()
                    ->take(100)
                    ->reverse();

        $graphPrediction = [$graphs, Windmill::find($id)->predictionValue];

        return response()->json($graphPrediction);
    }
}
