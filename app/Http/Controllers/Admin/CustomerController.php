<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Show all customer
    public function index(Request $request){
        if($request->ajax()){
            $data = DB::table('customers')->get();
                    return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($customer){
                            $action_btn = '<a href="" class="btn btn-primary edit" data-id= "'.$customer->id.'" data-toggle="modal" data-target="#editModal"><i
                            class="fas fa-edit"></i></a> <a href="'.route('customer.delete',[$customer->id]).'" class="btn btn-danger" id="delete"><i class="fas fa-trash"></i></a>';
                        return $action_btn;
                    })
                        ->rawColumns(['action'])
                        ->make([true]);
        }
        return view('admin.customer.index');
    }

    // Store Customer
    public function store(Request $request){
        $validated = $request->validate([
            'customer_name' => 'required',
            'phone' => 'required|unique:customers',
            'email' => 'required|unique:customers',
            'address' => 'required',
        ]);
        $data = [];
        $data['customer_name'] = $request->customer_name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        DB::table('customers')->insert($data);
        return response()->json("Customer Inserted Successfully");
    }

    // Customer Edit
    public function edit($id){
        $customer = DB::table('customers')->where('id', $id)->first();
        return view('admin.customer.edit', compact('customer'));
    }

    // Customer Update
    public function update(Request $request){
        $data = [];
        $data['customer_name'] = $request->customer_name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        DB::table('customers')->where('id',$request->old_id)->update($data);
        return response()->json("Coupon Updated Successfully");
    }

    // Customer Delete
    public function destroy($id){
        DB::table('customers')->where('id', $id)->delete();
        return response()->json('Coupon deleted!');
    }
}
