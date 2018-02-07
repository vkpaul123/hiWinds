<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfilePhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function photoUpload(Request $request) {
    	$this->validate($request, [
    		'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    	]);

    	$user = Auth::user();

    	if($request->hasFile('photo')) {
    		$fileName = "user_profile_dp".$user->id.".".$request->photo->getClientOriginalExtension();

    		if($request->photo->getClientOriginalExtension() == 'png')
				$image = Image::make($request->file('photo'))->resize(160, 160)->encode('png');
			else
				$image = Image::make($request->file('photo'))->resize(160, 160)->encode('jpg');

    		$t = Storage::disk('s3')->put('users/'.$user->id.'/'.$fileName, (string)$image, 'public');

    		$fileName = Storage::disk('s3')->url('users/'.$user->id.'/'.$fileName);

    		$user->photo = $fileName;

    		$user->save();

    		Session::flash('messageSuccess', 'Profile Photo Added Successfully.');
    		return redirect()->back();
    	}
    }
}
