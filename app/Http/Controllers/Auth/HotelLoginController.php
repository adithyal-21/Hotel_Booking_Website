<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Hotel;
use Illuminate\Support\Facades\Auth;


class HotelLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:hotel')->except('hotel_log');
    }
    public function hotel_log(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        if(Auth::guard('hotel')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
        {
        $data = Hotel::where('email',$request->email)->get();
        if($data[0]->status == 1)
        {
            return response()->json([
                'Message'=>"Logged in Successfully",
                'id'=>$data[0]->id,
                'email'=>$data[0]->email,
                'owner'=>$data[0]->name

            ],200);
        }
        else{
            return response()->json(['msg'=>'Hotel Not Found'],401);
        }
        }
        else{
            return response()->json(['msg'=>'Invalid Crendential'],401);
        }

    }
}
