<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request){
        $remember_me = $request->has('remember_me');
        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            $notification=array(
                'message' => 'تم تسجيل الدخول بنجاح',
                'alert-type' => 'success'
            );
            return redirect('admin/home')->with($notification);
        }
        return redirect()->back()->with('error', 'خطا في البيانات  برجاء المجاولة مجدا');
    }//end fun

    public function logout(){
        admin()->logout();
        $notification=array(
            'message' => 'تم تسجيل الخروج',
            'alert-type' => 'info'
        );
        return redirect('admin/login')->with($notification);
    }
}
