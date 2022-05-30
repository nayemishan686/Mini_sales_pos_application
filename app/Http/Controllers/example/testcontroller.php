<?php

namespace App\Http\Controllers\example;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class testcontroller extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function nayem(){
        return view('nayem');
    }

    public function hossain(){
        return view('hossain');
    }

    public function ishan(){
        return view('ishan');
    }

    public function creator(){
        return view('ourcreator');
    }

    public function contact(){
        return view('contact');
    }

    public function NayemForm(Request $request){
        return redirect('/');
    }
}
