<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Auth::routes();
//Admin Part

//Admin Login And Register
Route::post("admreg","Auth\AdminRegisterController@register");
Route::post("admlog","Auth\AdminLoginController@login");
//hotel Registration And Login
Route::post("hotelreg","Auth\HotelRegisterController@register");
Route::post("Hotellog",'Auth\HotelLoginController@hotel_log');
//Display Data
Route::get('Hotel_data', 'Auth\AdminRegisterController@display');
Route::get("Aprroved_hotel","Auth\HotelRegisterController@Approved_Hotel");
Route::get("getHotelid/{id}","Auth\HotelRegisterController@edithotel");
Route::get("getHotelProfile/{id}",'Auth\HotelRegisterController@getprofile');
Route::get("getHotel/{id}",'Auth\HotelRegisterController@gethotel');
Route::get("booking/{id}","Auth\HotelRegisterController@Booking_list");
//Accept And Delete
Route::get("accept/{id}",'Auth\AdminRegisterController@changestatus');
Route::delete("Delete/{id}",'Auth\AdminRegisterController@destroy');
Route::delete("DeleteAppHotel/{id}",'Auth\AdminRegisterController@destroyapphotel');
Route::get("gethotel","Auth\Extradetailscontroller@GetHotel");
Route::get("Aprrove_Extra","Auth\Extradetailscontroller@Approve_extra");
Route::get("getid/{id}","Auth\HotelRegisterController@Getid_Relation");
Route::get("checkstatus/{id}","Auth\Extradetailscontroller@Check_Status");
Route::get("getitemid/{id}","Auth\Extradetailscontroller@Get_Details");
//update
Route::post("update_hotel/{id}","Auth\HotelRegisterController@updateHotel");
Route::post("updatehotelimg/{id}",'Auth\HotelRegisterController@imageinsert');
Route::post("updatehotelimg1/{id}",'Auth\HotelRegisterController@imageinsert1');
Route::post("changepass",'Auth\HotelRegisterController@changepassword');
Route::post("Extra_Data",'Auth\Extradetailscontroller@store');
Route::post("relationdata","Auth\HotelRegisterController@Store_relation");
Route::post("update_extadata/{id}","Auth\Extradetailscontroller@updateextradata");

//user part
Route::post("usereg","Auth\UserRegisterController@register");
Route::post("userlog","Auth\UserLoginController@login");
Route::post("update_user/{id}","Auth\UserRegisterController@updateUser");
Route::get("getUserProfile/{id}",'Auth\UserRegisterController@getprofile');
Route::get("getuserid/{id}",'Auth\UserRegisterController@getuser');
Route::post("userimage/{id}",'Auth\UserRegisterController@imageinsert');
Route::post("findlocation",'Auth\UserRegisterController@Find_Location');
Route::get("getHotel_book/{id}",'Auth\UserRegisterController@gethotel');
Route::get("get_extra/{id}",'Auth\Extradetailscontroller@get_extra');
Route::get("getuserid1/{id}","Auth\UserRegisterController@Get_User");
Route::post("bookreg","Auth\Bookingcontroller@store");

//booking part
Route::get("booked_id/{id}","Auth\Bookingcontroller@set_status");
Route::delete("Delete_booking/{id}",'Auth\Bookingcontroller@destroy');
Route::get("getbookhistory/{id}","Auth\Bookingcontroller@Gethistory");
Route::get("getbooked_history/{id}","Auth\Bookingcontroller@Booked_data");
Route::post("Room_count_upd/{id}","Auth\HotelRegisterController@Update_room");
Route::get("user_list","Auth\UserRegisterController@User_data");
Route::delete("Delete_user/{id}",'Auth\UserRegisterController@destroy');
Route::post("hot_forpass",'Auth\HotelRegisterController@Update_password');
Route::post("admin_forpass",'Auth\AdminRegisterController@Update_password');
Route::post("user_forpass",'Auth\UserRegisterController@Update_password');
Route::get("getcount","Auth\AdminRegisterController@index");
Route::get("getcount_hotel/{id}","Auth\HotelRegisterController@index");
Route::get("getcount_hotel1","Auth\HotelRegisterController@index1");
Route::get("getcount_Booking/{id}","Auth\HotelRegisterController@index2");
Route::get("pending/{id}","Auth\HotelRegisterController@pending");
Route::get("user_book_count/{id}","Auth\UserRegisterController@index");
Route::get("user_hotel_count","Auth\UserRegisterController@index1");