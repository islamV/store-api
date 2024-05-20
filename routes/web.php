<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('' , function ()  {

    $img  = Storage::url('images/Hmp3cgZCuwtExhkcNZSLcGg8J999ddyvzJMxCtqn.png');

dd($img) ;


});

