<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class extadata extends Model
{
    protected $table = "extadatas";
    protected $fillable = [
        'hotel','days','rooms','timings','amount','status'
    ];
    public function Hotel(){
        return $this->belongsToMany(Hotel::class)->withTimestamps();
    }

  
}
    
