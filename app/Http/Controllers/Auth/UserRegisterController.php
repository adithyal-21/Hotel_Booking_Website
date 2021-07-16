<?php

namespace App\Http\Controllers\Auth;

use App\Booking;
use App\extadata;
use App\Hotel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\returnSelf;

class UserRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:api');
    }
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', ],
            'phone' => ['required', 'string', 'max:10'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        $check = User::where('email',"=",$request->email)->first();
        if($check == null)
        {
            $data = new User();
            $data->name=$request->name;
            $data->email=$request->email;
            $data->phone=$request->phone;
            $data->password=Hash::make($request->password);
            $data->save();
            return response()->json([
                'message'=>'User Registered Successfull'],200);
        }
        else{
        return response()->json(['message1'=>'Email Already Exist'],401);
        }
    }
    public function getprofile($id)
    {
        $data = User::find($id);
        return response()->json(['data1'=>$data],200);
    }
    public function getuser($id)
    {
        $data = User::find($id);
        return response()->json(['data'=>$data],200);
    }
    public function updateUser($id,Request $request)
    {
        $data=User::find($id);
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone = $request->phone;
       
       $data->save();
        return response()->json(['message'=>' Updated Successfully'],200);

        return response()->json("done");
    }
    public function imageinsert($id,Request $request)
    {
        $data = User::find($id);
        if($request->hasfile('image'))
        {
          $file=$request->file('image');
          $extension=$file->getClientOriginalExtension();
          $filename=mt_rand().'.'.$extension;
          $file->move('uploads/',$filename);
          $data->image=$filename;

        }
        else{
          $data->image='';
        }
        $data->save();
        return response()->json(["msg"=>'Sucessfully Uploaded']);
    }
    public function Find_Location(Request $request)
    {
        $data = Hotel::where('Hot_loc',$request->location)->where('status',1)->get();
     
        
        return response()->json(['data'=>$data],200);
       
    }
    public function gethotel($id)
    {
        $data = Hotel::find($id);
        return response()->json(['data1'=>$data],200);
        }
        public function Get_User($id)
        {
            $data = User::find($id);
            return response()->json(['data'=>$data],200);
        }
        public function User_data()
        {
            $user = User::all();
            return response()->json(['data1'=>$user],200);
        }
        public function destroy($id)
        {
            $delete = User::destroy($id);
            
            return response()->json(['msg'=>'Deleted Successfully']);
        }
        public function  Update_password(Request $request)
        {
            $change = User::where('email',$request->email)->first();
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
        public function index($id)
        {
            $data = Booking::where('email',$id)->get()->count();
            $data1 = Booking::all()->count();
            return response()->json(['booking'=>$data,'book1'=>$data1]);
        }

        public function index1(){
            $data = Hotel::where('status',1)->count();
            return response()->json(['hotel'=>$data]);
        }
}
