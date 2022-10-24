<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use Yajra\DataTables\DataTables;

class CityController extends Controller
{
    public function index(request $request)
    {
        if($request->ajax()) {
            $cities = City::latest()->get();
            return Datatables::of($cities)
                ->addColumn('action', function ($cities) {
                    return '
                            <button type="button" data-id="' . $cities->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $cities->id . '" data-title="' . $cities->title . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->escapeColumns([])
                ->make(true);
        }else{
//            $ip = '102.40.129.127'; /* Static IP address */
////            $ip = $request->ip();
//            $currentUserInfo = Location::get($ip);
//
//            return $currentUserInfo;
            return view('Admin/city/index');
        }
    }


    public function create()
    {
        return view('Admin/city.parts.create');
    }



    public function store(request $request): \Illuminate\Http\JsonResponse
    {
        $inputs = $request->validate([
            'title'      => 'required|max:255',
        ]);
        if(City::create($inputs))
            return response()->json(['status'=>200]);
        else
            return response()->json(['status'=>405]);
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


    public function edit(City $city)
    {
        return view('Admin/city.parts.edit',compact('city'));
    }



    public function update(Request $request)
    {
        $inputs = $request->validate([
            'id'         => 'required',
            'title'      => 'required',
        ]);
        $city = City::findOrFail($request->id);
        if ($city->update($inputs))
            return response()->json(['status' => 200]);
        else
            return response()->json(['status' => 405]);
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

    public function delete(Request $request)
    {
        $city = City::findOrFail($request->id);
        $city->delete();
        return response(['message'=>'Data Deleted Successfully','status'=>200],200);
    }

}
