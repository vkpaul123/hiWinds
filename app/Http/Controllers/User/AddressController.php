<?php

namespace App\Http\Controllers\User;

use App\Address;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AddressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companyPages.addressCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'street' => 'required',
            'locality' => 'required',
            'region' => 'required',
            'city' => 'required',
            'district' => 'required',
            'state' => 'required',
            'pincode' => 'required|numeric',
            'phone1' => 'required|numeric',
        ]);

        $address = new Address;
        $address->street = $request->street;
        $address->locality = $request->locality;
        $address->region = $request->region;
        $address->landmark = $request->landmark;
        $address->city = $request->city;
        $address->district = $request->district;
        $address->state = $request->state;
        $address->pincode = $request->pincode;
        $address->phone1 = $request->phone1;
        $address->phone2 = $request->phone2;
        $address->website = $request->website;
        $address->save();

        $user = User::find(Auth::user()->id);
        $user->address()->associate($address);

        $user->save();

        Session::flash('messageSuccess', 'Address Added Successfully.');
        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find(Auth::user()->id);
        if($id == $user->address_id) {
            $address = Address::find($id);

            return view('companyPages.addressUpdate')
            ->with(compact('address'));
        } else
            return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find(Auth::user()->id);
        if($id == $user->address_id) {
            $this->validate($request, [
                'street' => 'required',
                'locality' => 'required',
                'region' => 'required',
                'city' => 'required',
                'district' => 'required',
                'state' => 'required',
                'pincode' => 'required|numeric',
                'phone1' => 'required|numeric',
            ]);

            $address = Address::find($id);
            $address->street = $request->street;
            $address->locality = $request->locality;
            $address->region = $request->region;
            $address->landmark = $request->landmark;
            $address->city = $request->city;
            $address->district = $request->district;
            $address->state = $request->state;
            $address->pincode = $request->pincode;
            $address->phone1 = $request->phone1;
            $address->phone2 = $request->phone2;
            $address->website = $request->website;
            $address->save();

            return redirect(route('user.viewProfile'));
        } else
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
