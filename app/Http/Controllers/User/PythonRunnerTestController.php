<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Windmill;
use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class PythonRunnerTestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pythonScript($id) {
        // $process = new Process('python3 /home/vkpaul123/Laravel-Projects/highWinds/pythontry.py');
        // $process = new Process('python3 /pythonScripts/hello.py');

        $windmill = Windmill::find($id);

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
            return redirect()->back();
        }
    }

    private function get_string_between($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }
}
