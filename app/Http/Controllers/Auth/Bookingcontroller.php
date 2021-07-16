<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Booking;
use App\Hotel;
use \App\Mail\Sendmail;

class Bookingcontroller extends Controller
{
    public function store(Request $request)
    {
        $data = new Booking();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->arrival = $request->arrival;
        $data->days = $request->days;
        $data->rooms = $request->rooms;
        $data->Hotel_id = $request->hotelid;
        $data->status = 0;
        $data->save();
        return response()->json(['msg'=>'Booked Successfully'],200);
    }
    public function set_status($id)
    {
        $check = Booking::find($id);
        $check->status = 1;
        \Mail::to($check->email)->send(new SendMail());
        $check->save();
        return response( )->json(['data'=>$check,'msg'=>'Accepted Successfully']);
    }
    public function Gethistory($id)
    {
        $data = Booking::where('email',$id)->get();
        return response()->json(['data1'=>$data],200);
    }
    public function Booked_data($id){
        $checked = Booking::where('Hotel_id',$id)->where('status',1)->get();
        return response()->json(['data1'=>$checked],200);
    }
    public function destroy($id)
{
    $delete = Booking::destroy($id);
    
    return response()->json(['msg'=>'Deleted Successfully']);
}
}
