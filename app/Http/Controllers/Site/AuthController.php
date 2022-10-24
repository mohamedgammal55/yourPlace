<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\User;
use App\Models\UserAddress;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    use PhotoTrait;
    public function login(){
        if (Auth::guard('user')->check()){
            return redirect('profile');
        }
        else
            return view('site.login');
    }//end function

    public function postLogin(request $request){
        $data = $request->validate([
            'email'   =>'required',
            'password'=>'required'
        ],[
            'email.required'    => 'يجب ادخال البريد الالكتورني',
            'password.required' => 'يجب ادخال كلمة المرور'
        ]);
        // لو النوع يوزر يدخل في جدول اليوزو
        if($request->type == 'user'){
            if (Auth::guard('user')->attempt($data)){
                return response()->json([
                    'status' => 200,
                    'name'   => user()->user()->name
                ]);
            }
            return response()->json(405);
        }
        // لو النوع شركة يدخل في جدول الادمن
        else{
            if(auth()->guard('admin')->attempt($data)){
                return response()->json([
                    'status' => 201,
                    'name'   => loggedAdmin('name')
                ]);
            }
            return response()->json(405);
        }
    }//end function



    public function register(){
        if (Auth::guard('user')->check()){
            return redirect('profile');
        }
        return view('site.signup');
    }//end function

    public function postRegister(request $request){
        $data = $request->validate([
            'name'    =>'required',
            'phone'   =>['required','unique:users,phone','regex:/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im'],
            'email'   =>'required|unique:users,email',
            'password'=>'required|min:6',
        ],[
            'email.unique'      => 'البريد الالكتورني مسجل من قبل',
            'email.required'    => 'يجب ادخال البريد الالكتورني',
            'phone.required'    => 'يجب ادخال الهاتف',
            'phone.regex'       => 'صيغة الهاتف غير صحيحة',
            'password.required' => 'يجب ادخال كلمة مرور',
            'name.required'     => 'يجب ادخال الاسم'
        ]);
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if ($user){
            Auth::guard('user')->login($user);
            return response()->json([
                'status' => 200,
                'name'   => $data['name']
            ]);
        }
    }//end function



    public function profile(){
        $users = User::where('id','!=',Auth::user()->id)->latest()->take(3)->get();
        return view('site.profile',compact('users'));
    }//end function

    public function editProfile(){
        $user = User::where('id',Auth::user()->id)->first();
        return view('site.editProfile',compact('user'));
    }

    public function updateProfile(request $request){
        $data = $request->validate([
            'name'          =>'required',
            'phone'         =>'required',
            'email'         =>'required|email|unique:users,email,'.Auth::user()->id,
            'photo'         => 'nullable|image',
            'password'      => 'nullable|min:3',
            'latitude'      => 'nullable',
            'longitude'     => 'nullable'
        ]);
        $user = User::find(Auth::user()->id);
        if($request->has('photo')){
            $data['photo'] = $this->saveImage($request->photo,'assets/uploads/users','no');
        }
        // check if password was changed by the user then hash it else remove it from my array
        if($request->has('password') && $request->password != null){
            $data['password'] = Hash::make($request->password);
        }
        else
        {
            unset($data['password']);
        }
        $user->update($data);
        return response()->json(['status' => 200]);
    }

    public function DeleteAddress(request $request){
        $request->validate([
            'id' =>'required',
        ]);
        UserAddress::where([['user_id',Auth::user()->id]],['id',$request->id])->first()->delete();
        return response()->json(['status' => 200]);
    }

    public function AddNewAddress(request $request){
        $request->validate([
            'address' =>'required',
        ]);
        UserAddress::create([
            'user_id' => Auth::user()->id,
            'address' => $request->address
        ]);
        toastSuccess('Address Added Successfully');
        return redirect()->back();
    }


    public function logout(){
        user()->logout();
        toastr()->info('تم تسجيل الخروج');
        return redirect('login');
    }//end function

}
