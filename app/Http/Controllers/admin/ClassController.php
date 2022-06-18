<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    //Construct method load
    public function __construct()
    {
        $this->middleware('auth');
    }

    //data read function
    public function index(){
        $class = DB::table('class')->get();
        return view('admin.class.index',compact('class'));
    }

    //form to create table
    public function create(){
        return view('admin.class.create');
    }

    // store class
    public function store(Request $request){
        $request->validate([
            'className' => 'required|unique:class,class_name',
        ]);

        $data = array(
            'class_name' => $request->className,
        );

        DB::table('class')->insert($data);
        return redirect()->back()->with('success','Succesfully Inserted');
    }

    //delete class
    public function delete($id){
        DB::table('class')->where('id',$id)->delete();
        return redirect()->back()->with('success','Successfully Deleted');
    }
}
