<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PasswordController extends Controller
{

    public function changepassword()
    {
        return view('change-password');
    }
    public function update(Request $request)
    {
        
        $email = session('customer_name');
        $credetinal = $request->all();
        if($credetinal['new_password']!=$credetinal['confirm_new_password'])return back()->with('error','Nhập lại mật khẩu không đúng');
        $user = Customer::where('customer_email',$email)->first();
        if(!$user){
            return back()->with('error',"Tài khoản không tồn tại");
        }
        if($user->customer_password!=$credetinal['password']){
            return back()->with('error',"Mật khẩu không đúng");
        }
        $user->customer_password = $credetinal['new_password'];
        $user->save();
        return Redirect('/login-checkout');
    }
}
