<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Image;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
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

    // show all Product
    public function index(Request $request) {
        $product    = DB::table('products')->get();
        if ($request->ajax()) {
            return DataTables::of($product)
                ->addIndexColumn()
                ->editColumn('image', function ($row) {
                    return '<img src="'  . $row->image . '"  height="40" width="60" >';
                })
                ->editColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return '<a href="#" class="btn btn-danger btn-sm status_deactive" data-id= "' . $row->id . '"><i
                        class="fas fa-thumbs-down"></i></a> <span class="badge badge-success">active</span>';
                    } else {
                        return '<a href="#" class="btn btn-success btn-sm status_active" data-id= "' . $row->id . '"><i
                        class="fas fa-thumbs-up"></i></a> <span class="badge badge-danger">deactive</span>';
                    }
                })
                // ' . route('product.delete', [$row->id]) . '
                ->addColumn('action', function ($row) {
                    $action_btn = '<a href="' . route('product.edit', [$row->id]) . '" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                    <a href="' . route('product.delete', [$row->id]) . '" class="btn btn-danger" id="delete"><i class="fas fa-trash"></i></a>';
                    return $action_btn;
                })
                ->rawColumns(['action',  'image', 'status'])
                ->make([true]);
        }
        return view('admin.product.index');
    }

    // Product Create method
    public function create(){
        return view('admin.product.create');
    }

    // store product
    public function store(Request $request) {
        $validated = $request->validate([
           'name' => 'required',
           'quantity' => 'required',
           'purchase_price' => 'required',
           'sales_price' => 'required',
           'description' => 'required',
           'image' => 'required',
        ]);

        $slug = Str::slug($request->name, '-');
        $data                     = [];
        $data['name']             = $request->name;
        $data['quantity']             = $request->quantity;
        $data['purchase_price']      = $request->purchase_price;
        $data['sales_price']   = $request->sales_price;
        $data['description'] = $request->description;
        $data['image']     = $request->image;
        $data['status']             = $request->status;

        //working with thumbnail
        $image     = $request->image;
        $imagename = $slug . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(600, 600)->save('public/files/products/' . $imagename); //image intervention
        $data['image'] = 'public/files/products/'.$imagename; // files/brand/plus-point.jpg


        DB::table('products')->insert($data);
        $notification = ['messege' => 'Product Added Successfully', 'alert-type' => 'success'];
        return redirect()->back()->with($notification);

    }

    // Product Edit
    public function edit($id) {
        $product       = DB::table('products')->where('id', $id)->first();
        return view('admin.product.edit', compact('product'));
    }

    // Product Update
    public function update(Request $request,$id){
        $validated = $request->validate([
            'name' => 'required',
            'quantity' => 'required',
            'purchase_price' => 'required',
            'sales_price' => 'required',
            'description' => 'required',
        ]);
        $slug = Str::slug($request->name, '-');
        $data                     = [];
        $data['name']             = $request->name;
        $data['quantity']             = $request->quantity;
        $data['purchase_price']      = $request->purchase_price;
        $data['sales_price']   = $request->sales_price;
        $data['description'] = $request->description;
        $data['image']     = $request->image;
        $data['status']             = $request->status;
        //working with image
        if ($request->image) {
            $image = $request->old_image;
            if (File::exists(public_path($image))) {
                unlink(public_path($image));
            }
            $image     = $request->image;
            $imagename = $slug . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(600, 600)->save('public/files/products/' . $imagename);//image intervention
            $data['image'] = 'public/files/products/' . $imagename; // files/brand/plus-point.jpg
        } else {
            $data['image'] = $request->old_image;
        }
        DB::table('products')->update($data);
        $notification = ['messege' => 'Product Added Successfully', 'alert-type' => 'success'];
        return redirect()->back()->with($notification);
    }

    public function destroy($id) {
        $product = DB::table('products')->where('id', $id)->first();
        if (File::exists('public/files/products/' . $product->image)) {
            FIle::delete('public/files/products/' . $product->image);
        }
        DB::table('products')->where('id', $id)->delete();
        return response()->json("Product Deleted Successfully");
    }

    // Deactive status
    public function status_deactive($id) {
        DB::table('products')->where('id', $id)->update(['status' => 0]);
        return response()->json('Product Status deactive');
    }

    // Active status
    public function status_active($id) {
        DB::table('products')->where('id', $id)->update(['status' => 1]);
        return response()->json('Product Status active');
    }
}
