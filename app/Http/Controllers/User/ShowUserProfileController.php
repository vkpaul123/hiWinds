<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

    public function editProfile() {
    	return view('companyPages.profileUpdate');
    }

    public function updateProfile(Request $request) {
    	$this->validate($request, [
    		'firstname' => 'required',
    		'lastname' => 'required',
    		'companyname' => 'required',
    	]);

    	$user = User::find(Auth::user()->id);
    	$user->firstname = $request->firstname;
    	$user->middlename = $request->middlename;
    	$user->lastname = $request->lastname;
    	$user->companyname = $request->companyname;

    	$user->save();

    	Session::flash('messageSuccess', 'Profile Updated Successfully.');
    	return redirect()->back();
    }
}
