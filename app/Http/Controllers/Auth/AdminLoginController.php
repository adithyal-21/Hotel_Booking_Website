<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('login');
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
        {
            $data = Admin::where('email',$request->email)->get();
            return response()->json([
            'email'=>$data[0]->email,
            'name'=>$data[0]->name,
            'message'=>'Login Success',
        ],200);
        }
        else{
            return response()->json(["message1"=>'Invalid Credentails'],401);
        }
    }
    
}
