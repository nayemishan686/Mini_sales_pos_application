<?php

namespace App\Http\Controllers\example;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Log;

class testcontroller extends Controller {
    public function index() {
        return view('welcome');
    }

    public function nayem() {
        return view('nayem');
    }

    public function hossain() {
        return view('hossain');
    }

    public function ishan() {
        return view('ishan');
    }

    public function creator() {
        return view('ourcreator');
    }

    public function contact() {
        return view('contact');
    }

    public function NayemForm(Request $request) {
        return redirect('/');
    }

    //how to define view
    public function laravel() {
        //return view('laravel');
        if (view::exists('laravel')) {
            return View::make('laravel', ['name' => 'Nayem Ishan']);
        } else {
            return "Your route is not available";
        }
    }

    //myForm validation
    public function myForm(Request $request){
        $validate = $request->validate([
            'name' => 'required|max:30|min:6',
            'email' => 'required|max:80',
            'password' =>'required|min:4'
        ]);
        //how to store in log file
        Log::channel('submittedContact')->info("The contact form submitted by ".rand(1,20));
        
        $logfile = file(storage_path().'/logs/contact.log');
        $collection = [];
        foreach($logfile as $line_number => $line){
            $collection = array('Line' => $line_number, 'Content' => htmlspecialchars($line));
        }
        dd($collection);
    }
}
