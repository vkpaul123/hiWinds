<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->address_id == null){
            Session::flash('message', 'Welcome to High<b>Winds</b>!<br>Please add your <b>Address</b> to continue to the Dashboard.');
            return redirect(route('address.create'));
        }
        
        return redirect(route('windmill.index'));
    }
}
