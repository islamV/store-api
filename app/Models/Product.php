<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable= [
        // 'user_id',
        'name',
        'description',
        'category_id',
        'quantity',
        'price',
        'image'
    ];

    public function category(){
        return $this->belongsTo(Category::class) ;
    }

    public function getImageAttribute($image){
        return env('APP_URL') . '/storage/' . $image;
    }
    public function setImageAttribute($image){
        $position = strpos($image, "images/");
        $path = substr($image, $position);
        $this->attributes['image'] = $path;
    }

}
