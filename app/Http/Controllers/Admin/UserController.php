<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(request $request)
    {
        if($request->ajax()) {
            $users = User::latest()->get();
            return Datatables::of($users)
                ->editColumn('created_at', function ($users) {
                    return '' . $users->created_at->diffForHumans();
                })
                ->editColumn('phone', function ($users) {
                    if($users->phone != null)
                        return '<a href="tel:'.$users->phone.'">'.$users->phone.'</a>';
                    else
                        return '----';
                })
                ->escapeColumns([])
                ->make(true);
        }else{
            return view('Admin/users/index');
        }
    }
}
