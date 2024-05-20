<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
protected $fillable  =['total_price' ,'details'  ,'user_id' ,'status' ] ;
    public function payment(){
        return $this->belongsTo(Payment::class) ;
    }
    public function user(){
        return $this->belongsTo(User::class) ;
    }
    public function getCreatedAtAttribute($date)
    {
        $date = \Carbon\Carbon::parse($date) ;

        return empty($date) ? $date :  $date->diffForHumans();
    }

}
