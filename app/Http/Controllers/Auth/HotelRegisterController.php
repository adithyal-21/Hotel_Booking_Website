<?php

namespace App\Http\Controllers\Auth;

use App\Booking;
use App\Hotel;
use App\extadata;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class HotelRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:hotel');
    }
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'owner' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', ],
            'phone' => ['required', 'string', 'max:10'],
            
        ]);
        $check = Hotel::where('Hot_name',$request->name)->first();
        if($check == null)
        {
            $check1=Hotel::where('email',$request->email)->first();
            if($check1 == null)
            {
                $data = new Hotel();
                $data->Hot_name=$request->name;
                $data->Hot_loc=$request->location;
                $data->Hot_address=$request->address;
                $data->name=$request->owner;
                $data->email=$request->email;
                $data->phone=$request->phone;
                $data->password=Hash::make($request->phone);
                $data->status=0;
                $data->save();
                return response()->json(['message'=>'Hotel Registered Successfully'],200);

            }
            else{
                return response()->json(['error'=>'Email Taken'],401);
            }
        }
        else{
            return response()->json(['error'=>'Hotel Name Taken'],401);
        }
    }
    public function Approved_Hotel()
    {
        $data = Hotel::where('status',1)->get();
        return response()->json(['hoteldata'=>$data],200);
    }
    public function edithotel($id){
        $data = Hotel::find($id);
        return response()->json(['data'=>$data],200);
    }
    public function updateHotel($id,Request $request)
    {
        $data=Hotel::find($id);
        $data->Hot_name=$request->Hot_name;
        $data->Hot_loc=$request->Hot_loc;
        $data->Hot_address = $request->Hot_address;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
       $data->save();
        return response()->json(['message'=>'Hotel Updated Successfully'],200);

        return response()->json("done");
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
            return response()->json(['data'=>$data]);
        }
        else{
            return response()->json(['msg'=>'hotel not selected']);
        }
     
        }
        else{
            return response()->json(['msg'=>'invalid crendential']);
        }

    }
    public function changepassword(Request $request)
    {
        $change = Hotel::where('email',$request->email)->get();
        $change[0]->password = Hash::make($request->password);
        $change[0]->save();
        return response()->json(['message'=>"Password Updated Successfully"],200);

    }
    public function getprofile($id)
    {
        $data = Hotel::find($id);
        return response()->json(['data1'=>$data],200);

    }
    public function gethotel($id)
    {
        $data = Hotel::find($id);
        return response()->json(['data'=>$data],200);
    }
    public function imageinsert($id,Request $request)
    {
        $data = Hotel::find($id);
        if($request->hasfile('image'))
        {
          $file=$request->file('image');
          $extension=$file->getClientOriginalExtension();
          $filename=mt_rand().'.'.$extension;
          $file->move('uploads/',$filename);
          $data->image1=$filename;

        }
        else{
          $data->image1='';
        }
        $data->save();
        return response()->json(["msg"=>'Sucessfully Uploaded']);
    }
    public function imageinsert1($id,Request $request)
    {
        $data = Hotel::find($id);
        if($request->hasfile('image'))
        {
          $file=$request->file('image');
          $extension=$file->getClientOriginalExtension();
          $filename=mt_rand().'.'.$extension;
          $file->move('uploads/',$filename);
          $data->image2=$filename;

        }
        else{
          $data->image2='';
        }
        $data->save();
        return response()->json(["msg"=>'Sucessfully Uploaded']);
    }
    public function Store_relation(Request $request)
    {
      
        $hotel = Hotel::find($request->hotel);
        $item = $request->item;
        $hotel->extadata()->attach($item);
        $data = extadata::find($item)->first();
        $data->status = 1;
        $data->save();
       
        
        return response()->json(['msg'=>'Successfully Accepted'],200);

    }
    public function Getid_Relation($id)
    {
        $data1 = Hotel::find($id);
        return response()->json(['data1'=>$data1],200);
    }
    public function Booking_list($id)
    {
        $data = Hotel::find($id)->getdata;
        return response()->json(['data'=>$data],200);
    }
    public function Update_room($id,Request $request)
    {
        $update = Hotel::find($id);
        $update->Room_count = $request->count;
        $update->save();
        return response()->json(['msg'=>'Uploaded Successfully'],200);

    }
    public function  Update_password(Request $request)
    {
        $change = Hotel::where('email',$request->email)->first();
        if($change == null)
        {
            return response()->json(['error'=>'Email Not Found'],401);
        }
        else
        {
            if($change->status == 0)
            {
                return response()->json(['error'=>'Hotel Not Found'],401);
            }
            $change->password = Hash::make($request->password);
            $change->save();
            return response()->json(['success'=>'Password Updated Successfully'],200);
        }
      
    }
    public function index($id)
    {
        $data = extadata::where('hotel',$id)->get();
       if($data[0]->status == 1)
        {
            return response()->json(['msg'=>'Accepted','data_house'=>$data]);
         
        }
        else{
            return response()->json(['msg'=>'Pending...']);
        }
    
      
      
       
    }
    public function index1()
    {
        $info = User::all()->count();
        return response()->json(['user'=>$info]);
    }
    public function index2($id)
    {
        $book = Booking::where('Hotel_id',$id)->count();
        return response()->json(['book'=>$book]);
    }
    public function pending($id)
    {
        $data = Booking::where('Hotel_id',$id)->where('status',0)->count();
        return response()->json(['pending'=>$data]);
       
    }
}
