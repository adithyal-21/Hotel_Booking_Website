<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Hotel extends  Authenticatable 
{
    use Notifiable;
  
  
    protected $guard = 'hotels';

    protected $fillable = [
        'Hot_name','Hot_loc','Hot_address','name','email','phone','password','status'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function extadata(){
        return $this->belongsToMany(extadata::class)->withTimestamps();
    }
    public function getdata(){
        return $this->hasMany('App\Booking');
    }

}
