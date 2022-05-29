<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\example\testcontroller;
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

/*right way to define view file using route who will send them in controller */

//index page routing
Route::get('/', [testcontroller::class, 'index']);
//nayem page routing
Route::get('/nayem', [testcontroller::class, 'nayem']);
//hossain page routing
Route::get('/hossain', [testcontroller::class, 'hossain']);
//ishan page routing
Route::get('/ishan', [testcontroller::class, 'ishan']);
//named routing
Route::get('/creator', [testcontroller::class, 'creator'])->name('mycreator');
//contact page routing
Route::get('/contact',[testcontroller::class, 'contact'])->middleware('contact');













/* this is wrong way to define view file by rout */
// Route::get('/', function () {
//     return view('welcome');
// });


// // One Way to define route
// Route::get('/nayem',function(){
//         return view('nayem');
//     });
 
    
// // Another Way to define route
// Route::view('/hossain','hossain');


// // // Another Way to define route
// Route::match(['get','post'], '/ishan', function(){
//     return view('ishan');
// });

// // Another Way to define route
// Route::any('/contact', function(){
//     return view('contact');
// });


// // // parameter routing
// Route::any('/contact/{serial}', function($serial){
//     return "I need you $serial serial number";
// });

// // // named routing
// Route::get('/new', function(){
//     return "Allah is our creator";
// })->name('mycreator');


// //route using middleware
// Route::get('/contact',function(){
//     return view('contact');
// })->middleware('contact');












// Ignore it
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
