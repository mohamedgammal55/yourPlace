<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Reservations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationsController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->only('from_date','to_date','address');
        $data['user_id'] = user()->user()->id;
        $car = Car::find($request->car_id);
        $data['admin_or_company_id'] = $car->added_by;
        $data['car_id'] = $car->id;
        $data['price'] = $car->price;
        Reservations::create($data);
        toastr()->success('تم الدفع بنجاح');
        return redirect(route('reservations.index'));
    }//end fun
    public function index()
    {
        $reservations = Reservations::where('user_id',user()->id())->with('car','company')->latest()->get();
//        return $reservations;
        return view('site.reservations',compact('reservations'));
    }//end fun
}//end class
