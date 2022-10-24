<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(){
        return view('site/contact');
    }

    public function create(request $request){
        $data = $request->validate([
            'name'          =>'required',
            'phone'         =>'required',
            'email'         =>'required',
            'title'         =>'required',
            'message'       =>'required',
        ]);
        ContactUs::create($data);
        return response()->json(['status' => 200]);
    }
}
