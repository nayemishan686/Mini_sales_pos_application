<?php

use App\Http\Controllers\admin\StudentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/check', function () {
    echo "Hi";
});

//Admin Home
Route::get('/admin/home', [App\Http\Controllers\HomeController::class,'adminHome'])->name('admin.home')->middleware('is_admin');












