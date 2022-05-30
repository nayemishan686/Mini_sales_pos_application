<?php

namespace App\Http\Controllers\example;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

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
        if (view::exists('laravels')) {
            return View::make('laravel', ['name' => 'Nayem Ishan']);
        } else {
            return "Your route is not available";
        }
    }
}
