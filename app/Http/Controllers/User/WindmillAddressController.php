<?php

namespace App\Http\Controllers\User;

use App\Address;
use App\Http\Controllers\Controller;
use App\Windmill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WindmillAddressController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        $address->save();

        $windmill = Windmill::find($request->windmill_id);
        $windmill->address()->associate($address);

        $windmill->save();

        Session::flash('messageSuccess', 'Address Added Successfully.');
        return redirect(route('windmill.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('companyPages.windmill.addressCreate')
        ->with(compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $address = Address::find($id);

        return view('companyPages.windmill.addressUpdate')
        ->with(compact('address'));
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
        $this->validate($request, [
            'street' => 'required',
            'locality' => 'required',
            'region' => 'required',
            'city' => 'required',
            'district' => 'required',
            'state' => 'required',
            'pincode' => 'required|numeric',
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
        $address->save();

        Session::flash('messageSuccess', 'Address Updated Successfully.');
        return redirect(route('windmill.show', $address->windmill->first()->id));
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
