<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('login');
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if(Auth::guard('api')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
        {
            $data = User::where('email',$request->email)->get();
            return response()->json([
            'id'=>$data[0]->id,
            'email'=>$data[0]->email,
            'name'=>$data[0]->name,
            'phone'=>$data[0]->phone,
            
            'message'=>'Login Success',
        ],200);
        }
        else{
            return response()->json(["message1"=>'Invalid Credentails'],401);
        }
    
   
}
}
