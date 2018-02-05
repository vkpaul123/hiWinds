<?php

namespace App\Http\Controllers\User;

use App\Address;
use App\Http\Controllers\Controller;
use App\Windmill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class WindmillExcelUploadController extends Controller
{
    public function uploadWindmills(Request $request) {
    	$this->validate($request, [
    		'excelFile' => 'required',
    	]);

    	if($request->hasFile('excelFile')) {
    		if($request->file('excelFile')->getClientOriginalExtension() != "xlsx") {
    			Session::flash('message', 'Invalid File Type! Please upload a file with <b>.xlsx</b> format only.');
    			return redirect()->back();
    		}

    		$path = $request->file('excelFile')->getRealPath();

    		$dataValidate = Excel::load($path, function($reader) {})->get([
    			'manufacturer',
    			'modelno',
    			'street',
    			'locality',
    			'region',
    			'city',
    			'district',
    			'state',
    			'pincode'
    		]);

    		if(!empty($dataValidate) && $dataValidate->count()) {
    			foreach ($dataValidate as $row) {
    				if(!empty($row)) {
    					foreach ($row as $cell) {
    						if($cell == null) {
    							Session::flash('message', 'One of the Required Fields in the File is <b>empty</b>! Please upload a valid file.');
    							return redirect()->back();
    						}
    					}
    				}
    			}
    		}
    		else {
    			Session::flash('message', '<b>No Data found</b> in the file! Please upload a valid file.');
                return redirect()->back();
    		}

    		if(!empty($dataValidate) && $dataValidate->count()) {
    			$dataValidate == null;

    			$dataFinal = Excel::load($path, function($reader) {})->get([
    				'manufacturer',
	    			'modelno',
	    			'ratedpower',
	    			'ratedwindspeed',
	    			'ratedrpm',
	    			'rotordiameter',
	    			'street',
	    			'locality',
	    			'region',
	    			'landmark',
	    			'city',
	    			'district',
	    			'state',
	    			'pincode'
    			]);

    			foreach ($dataFinal as $row) {
    				if(!empty($row)) {
    					$address = new Address;
    					$address->street = $row['street'];
    					$address->locality = $row['locality'];
    					$address->region = $row['region'];
    					$address->landmark = $row['landmark'];
    					$address->city = $row['city'];
    					$address->district = $row['district'];
    					$address->state = $row['state'];
    					$address->pincode = $row['pincode'];

    					$address->save();

    					$windmill = new Windmill;
    					$windmill->manufacturer = $row['manufacturer'];
    					$windmill->modelno = $row['modelno'];
    					$windmill->ratedpower = $row['ratedpower'];
    					$windmill->ratedwindspeed = $row['ratedwindspeed'];
    					$windmill->ratedrpm = $row['ratedrpm'];
    					$windmill->rotordiameter = $row['rotordiameter'];

    					$windmill->user()->associate(Auth::user());
    					
    					$windmill->address()->associate($address);

    					$windmill->save();
    				}
    			}
    		}
    	}
    	
    	Session::flash('messageSuccess', 'Wind-Turbine Details Exported Successfully!');
	   	return redirect()->back();
    }
}
