<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//to verify email
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

//to show verification notice
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

//to send verification resend
Route::post('verify/email',[App\Http\Controllers\HomeController::class, 'resend'])->name('verification.resend');

//Deposite route
Route::get('/deposite',[App\Http\Controllers\HomeController::class, 'deposite'])->name('deposite')->middleware('verified');

//about details
Route::get('/details/{id}', [App\Http\Controllers\HomeController::class, 'details'])->name('about.mine');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
