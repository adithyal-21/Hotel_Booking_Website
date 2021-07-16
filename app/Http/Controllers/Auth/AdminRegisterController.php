<?php

namespace App\Http\Controllers\Auth;
use App\Admin;
use App\Hotel;
Use App\Booking;
use App\extadata;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use \App\Mail\Sendmail;
use App\User;

class AdminRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', ],
            'phone' => ['required', 'string', 'max:10'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        $check = Admin::where('email',"=",$request->email)->first();
        if($check == null)
        {
            $data = new Admin();
            $data->name=$request->name;
            $data->email=$request->email;
            $data->phone=$request->phone;
            $data->password=Hash::make($request->password);
            $data->save();
            return response()->json([
                'message'=>'Admin Registered Successfull'],200);
        }
        else{
        return response()->json(['message1'=>'Email Already Exist'],401);
        }
    }
    public function display()
        {
        $check = Hotel::where('status',0)->get();
        return response()->json([
       "Hotellist" => $check,],200);


}
public function changestatus($id){
  
   $find = Hotel::find($id);
   $find->status = 1;
   \Mail::to($find->email)->send(new SendMail());
   $find->save();
  return response()->json(['msg'=>'Accepted Successfully'],200);
}
public function destroy($id)
{
    $delete = Hotel::destroy($id);
    
    return response()->json(['msg'=>'Deleted Successfully']);
}
public function destroyapphotel($id)
{
    $delete = Hotel::destroy($id);
    
    return response()->json(['msg'=>'Deleted Successfully']);
}
public function  Update_password(Request $request)
{
    $change = Admin::where('email',$request->email)->first();
    if($change == null)
    {
        return response()->json(['error'=>'Email Not Found'],401);
    }
    else{
        $change->password = Hash::make($request->password);
        $change->save();
        return response()->json(['success'=>'Password Updated Successfully'],200);
    }
  
}
public function index()
{
    $hotel =Hotel::where('status',1)->count();
    $booking = Booking::where('status',1)->count();
    $user = User::all()->count();
    $pending = Hotel::where('status',0)->count();
    $pending1 = extadata::where('status',0)->count();
    return response()->json(['hotel'=>$hotel,'user'=>$user,'book'=>$booking,'pending'=>$pending,'pending1'=>$pending1]);
}


}
