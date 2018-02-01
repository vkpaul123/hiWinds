<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowUserProfileController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
	    $this->middleware('auth');
	}
	
    public function showProfile() {
    	$windmillsCount = Auth::user()->windmill()->get()->count();
    	$powerCapacity = Auth::user()->windmill()->get()->sum('ratedpower');
    	$address = Auth::user()->address()->get()->first();

    	return view('companyPages.viewUserProfile')
    	->with(compact('windmillsCount'))
    	->with(compact('powerCapacity'))
    	->with(compact('address'));
    }
}
