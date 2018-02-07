<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class PythonRunnerTestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pythonScript() {
    	// $process = new Process('python3 /home/vkpaul123/Laravel-Projects/highWinds/pythontry.py');
    	// $process = new Process('python3 /pythonScripts/hello.py');
    	$process1 = new Process('pwd');
    	$process1->run();

    	$string = trim(preg_replace('/\s\s+/', ' ', $process1->getOutput()));

    	$process = new Process('python3 '.$string.'/pythonScripts/hello.py');

    	$process->run();

    	if(!$process->isSuccessful())
    		throw new ProcessFailedException($process);
    		
    	return $process->getOutput();
    }
}
