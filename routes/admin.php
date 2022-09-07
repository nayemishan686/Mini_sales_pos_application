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
// Admin Login
Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin.login');

Route::get('/check', function () {
    echo "Hi";
});

// Route::get('/admin/home', [App\Http\Controllers\Admin\AdminController::class,'adminHome'])->name('admin.home')->middleware('is_admin');

// Group Route
Route::group(['namespace' => 'App\Http\Controllers\Admin', 'middleware' => 'is_admin'], function () {

    //Admin Home
    Route::get('/amarbazar', 'AdminController@adminHome')->name('admin.home');
    // Admin Logout
    Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout');
    // Admin Password Change
    Route::get('/admin/password/change', 'AdminController@adminPassword')->name('admin.password.change');
    // Admin Password Update
    Route::post('/admin/password/update', 'AdminController@passwordUpdate')->name('admin.password.update');

    // Customer CRUD
    Route::group(['prefix' => 'customer'], function () {
        Route::get('/', 'CustomerController@index')->name('customer.index');
        Route::post('/store', 'CustomerController@store')->name('customer.store');
        Route::delete('/destroy/{id}', 'CustomerController@destroy')->name('customer.delete');
        Route::get('/edit/{id}', 'CustomerController@edit');
        Route::post('/update', 'CustomerController@update')->name('customer.update');
    });
    
    // Product CRUD
    Route::group(['prefix' => 'product'], function () {
        Route::get('/', 'ProductController@index')->name('product.index');
        Route::get('/create', 'ProductController@create')->name('product.create');
        Route::post('/store', 'ProductController@store')->name('product.store');
        Route::delete('/destroy/{id}', 'ProductController@destroy')->name('product.delete');
        Route::get('/edit/{id}', 'ProductController@edit')->name('product.edit');
        Route::post('/update/{id}', 'ProductController@update')->name('product.update');
        // active & deactive status
        Route::get('/deactive_status/{id}', 'ProductController@status_deactive');
        Route::get('/active_status/{id}', 'ProductController@status_active');
    });
});










