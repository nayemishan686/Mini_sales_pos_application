<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\example\testcontroller;
use Illuminate\Http\Request;

Route::get('/check',function(){
    return "hi check check";
});