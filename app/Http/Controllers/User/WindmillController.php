<?php

namespace App\Http\Controllers\User;

use App\Address;
use App\Http\Controllers\Controller;
use App\Windmill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WindmillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $windmills = Windmill::where('user_id', Auth::user()->id)->get();

        return view('companyPages.windmill.windmillIndex')
        ->with(compact('windmills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companyPages.windmill.windmillCreate');
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
            'manufacturer' => 'required',
            'modelno' => 'required',
        ]);

        $windmill = new Windmill;

        // $windmill->user_id = Auth::user()->id;

        $windmill->manufacturer = $request->manufacturer;
        $windmill->modelno = $request->modelno;
        $windmill->ratedpower = $request->ratedpower;
        $windmill->ratedwindspeed = $request->ratedwindspeed;
        $windmill->ratedrpm = $request->ratedrpm;
        $windmill->rotordiameter = $request->rotordiameter;

        $windmill->user()->associate(Auth::user());

        $windmill->save();

        return redirect(route('windmillAddress.show', $windmill->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $windmill = Windmill::find($id);
        $address = Address::find($windmill->address_id);

        return view('companyPages.windmill.windmillShow')
        ->with(compact('windmill'))
        ->with(compact('address'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $windmill = Windmill::find($id);

        return view('companyPages.windmill.windmillUpdate')
        ->with(compact('windmill'));
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
        //
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
