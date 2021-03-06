<?php

namespace App\Http\Controllers\User;

use App\Address;
use App\Http\Controllers\Controller;
use App\Masterlog;
use App\Windmill;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WindmillController extends Controller
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
        $windmills = Windmill::where('user_id', Auth::user()->id)->get();

        $addresses = Address::all();

        return view('companyPages.windmill.windmillIndex')
        ->with(compact('windmills'))
        ->with(compact('addresses'));
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
        $this->validate($request, [
            'manufacturer' => 'required',
            'modelno' => 'required',
        ]);

        $windmill = Windmill::find($id);

        $windmill->manufacturer = $request->manufacturer;
        $windmill->modelno = $request->modelno;
        $windmill->ratedpower = $request->ratedpower;
        $windmill->ratedwindspeed = $request->ratedwindspeed;
        $windmill->ratedrpm = $request->ratedrpm;
        $windmill->rotordiameter = $request->rotordiameter;

        $windmill->save();

        return redirect(route('windmill.show', $windmill->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $windmill = Windmill::find($id);
        Address::find($windmill->address_id)->delete();
        $windmill->delete();

        return redirect(route('windmill.index'));
    }

    public function downloadUploadTemplate()
    {
        $file = Storage::disk('s3')->get('addWindMills.xlsx');

        $headers = [
            'Content-Type' => 'application/vnd.ms-excel',
            'Content-Description' => 'File Transfer',
            'Content-Disposition' => "attachment; filename=addWindMills.xlsx",
            'filename'=> 'addWindMills.xlsx'
        ];

        return response($file, 200, $headers);
    }

    public function loadMonthlyGraph($id) {
        $last6months =  Masterlog::select("created_at")->where("created_at",">", Carbon::now()->subMonths(6))->where("windmill_id", $id)->orderby("created_at")->get();

        $months = [];
        foreach ($last6months as $month) {
            array_push($months, $month->created_at->format('F-Y'));
        }

        $months = array_values(array_unique($months));

        $monthlyPowerAvg = [];
        foreach ($months as $month) {
            $powersForMonth = Masterlog::whereYear("created_at", "=", Carbon::parse($month)->year)
                                        ->whereMonth("created_at", "=", Carbon::parse($month)->month)
                                        ->get();
            $powerSum = 0;
            foreach ($powersForMonth as $powerForMonth) {
                $powerSum += $powerForMonth->power;
            }
            array_push($monthlyPowerAvg, [$month, $powerSum/$powersForMonth->count()]);
        }

        return json_encode($monthlyPowerAvg);
    }
}
