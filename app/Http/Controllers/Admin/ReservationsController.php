<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservations;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ReservationsController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $reservations = Reservations::with('user', 'car', 'company')->where(function ($query) use ($request) {
                if (loggedAdmin('role') == 'company')
                    $query->where('admin_or_company_id', admin()->id());

                if ($request->status == 'new')
                    $query->where('status', 'new');
                elseif ($request->status == 'old')
                    $query->where('status', '!=', 'new');

            })->latest()->get();
            return Datatables::of($reservations)
                ->addColumn('action', function ($reservation) {
                    if ($reservation->status == 'new')
                    return '
                            <button type="button" data-id="' . $reservation->id . '" data-status="accepted" class="btn btn-pill btn-success-light editBtn"><i class="fas fa-check"></i></button>
                            <button class="btn btn-pill btn-danger-light editBtn"
                                    data-id="' . $reservation->id . '" data-status="refused">
                                    <i class="fas fa-times"></i>
                            </button>
                       ';

                    if ($reservation->status == 'refused')
                        return  'refused';

                    return 'accepted';

                })
                ->editColumn('created_at', function ($reservation) {
                    return $reservation->created_at->diffForHumans();
                })
                ->addColumn('name', function ($reservation) {
                    return $reservation->user->name ?? '';
                })
                ->addColumn('car', function ($reservation) {
                    return $reservation->car->category['title_ar'] . ' ' . $reservation->car->sub_category['title_ar'];
                })
                ->addColumn('company', function ($reservation) {
                    return $reservation->company->name ?? '';
                })
                ->addColumn('two_dates', function ($reservation) {
                    return 'From ' . $reservation->from_date . ' to ' . $reservation->to_date;
                })
                ->escapeColumns([])
                ->make(true);
        }

        return view('Admin.reservations.index',compact('request'));
    }//end fun

    public function edit($id,Request $request)
    {
        Reservations::find($id)->update(['status' => $request->get('status')]);
    }

}
