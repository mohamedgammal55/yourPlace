<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (!$request->post()) {
            if (company()->check())
                return redirect()->route('company.dashboard');

            return view('Company.auth.login');
        }

        $data = $request->validate([
            'email' => 'required:exists:companies',
            'password' => 'required'
        ]);

        if (company()->attempt($data))
            return redirect()->route('company.home');

        return redirect()->back()->with('error', 'خطا في البيانات  برجاء المجاولة مجدا');
    }//end fun
}//end class
