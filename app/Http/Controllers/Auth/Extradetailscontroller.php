<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\extadata;
use App\Hotel;

class Extradetailscontroller extends Controller
{
    public function store(Request $request)
    {
        $check = extadata::where('hotel',$request->hotel)->get();
        if($check->isEmpty())
        {
            $data = new extadata();
            $data->hotel = $request->hotel;
            $data->days = $request->days;
            $data->rooms = $request->rooms;
            $data->timings = $request->timings;
            $data->amount = $request->amount;
          
            $data->status = 0;
            $data->save();
            return response()->json(["msg"=>'Successfully Done'],200);
         
        } 
        else{
            return response()->json(['msg'=>'You Have Submitted Once'],401);
        }
    }
    public function Approve_extra()
    {
        $data = extadata::where('status',0)->get();
        return response()->json(['hotelExtra'=>$data],200);
    }
   public function GetHotel()
   {
    $data = Hotel::where('status',1)->get();
   return response()->json(['gethotel'=>$data],200);
   }
   public function Check_Status($id)
   {
    $data1 = Hotel::find($id);
    $add = $data1->extadata;
 
    return response()->json(['data'=>$add,'message'=>'Your Data Is Accepted Successfully'],200);
  }

  public function Get_Details($id)
  {
      $data = extadata::find($id);
      return response()->json(['data'=>$data],200);
  }
  public function updateextradata($id,Request $request)
  {
      $data = extadata::find($id);
      $data->hotel =$request->hotel;
      $data->days =$request->days;
      $data->rooms =$request->rooms;
      $data->timings=$request->timings;
      $data->amount=$request->amount;
    
      $data->save();
      return response()->json(['data'=>$data,'msg'=>'Updated Successfully'],200);
  }
  public function get_extra($id)
  {
   $data1 = Hotel::find($id);
   $extra = $data1->extadata;

   return response()->json(['data'=>$extra,],200);
 }

}
