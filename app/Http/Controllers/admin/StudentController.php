<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
     //Construct method load
     public function __construct()
     {
         $this->middleware('auth');
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = DB::table('students')
                    ->join('class','class.id','students.Class_id')
                    ->get();
        return view('admin.students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class = DB::table('class')->get();
        return view('admin.students.create',compact('class'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4',
            'roll' => 'required',
            'className' => 'required',
            'phone' => 'required|min:11',
            'mail' => 'required',
        ]);

        $students = [
            'name' => $request->name,
            'roll' => $request->roll,
            'Class_id' => $request->className,
            'email' => $request->mail,
            'phone' => $request->phone,
        ];

        DB::table('students')->insert($students);
        return redirect()->back()->with('success','Student Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sData = DB::table('students')->where('id',$id)->first();
        return response()->json($sData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class = DB::table('class')->get();
        $student = DB::table('students')->where('id',$id)->first();
        return view('admin.students.edit',compact('class','student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:4',
            'roll' => 'required',
            'className' => 'required',
            'phone' => 'required|min:11',
            'mail' => 'required',
        ]);
        
        $sdata = [
            'name' => $request->name,
            'roll' => $request->roll,
            'Class_id' => $request->className,
            'email' => $request->mail,
            'phone' => $request->phone, 
        ];
        DB::table('students')->where('id',$id)->update($sdata);
        return redirect()->route('students.index')->with('success', 'Data updated succefully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('students')->where('id',$id)->delete();
        return redirect()->back()->with('success','Student deleted successfully');
    }
}
