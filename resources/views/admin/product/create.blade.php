@extends('layouts.admin')

@section('admin_content')
    @push('css')
        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" />
        <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">


        <style type="text/css">
            .bootstrap-tagsinput .tag {
                background: #428bca;
                ;
                border: 1px solid white;
                padding: 1 6px;
                padding-left: 2px;
                margin-right: 2px;
                color: white;
                border-radius: 4px;
            }
        </style>
    @endpush


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>New Product</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add product</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-8">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add New Product</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label for="exampleInputEmail1">Product Name <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name') }}" placeholder="Enter Product Name">
                                            @error('name')
                                                <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="exampleInput">Selling Price <span class="text-danger">*</span>
                                            </label>
                                            <input type="number" name="sales_price" value="{{ old('sales_price') }}"
                                                class="form-control @error('sales_price') is-invalid @enderror"
                                                placeholder="Enter Selling Price">
                                            @error('sales_price')
                                                <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="exampleInput">Purchase Price <span class="text-danger">*</span>
                                            </label>
                                            <input type="number" name="purchase_price" value="{{ old('purchase_price') }}"
                                                class="form-control @error('purchase_price') is-invalid @enderror"
                                                placeholder="Enter Selling Price">
                                            @error('purchase_price')
                                                <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="quantity">Stock</label>
                                            <input type="text" name="quantity" value="{{ old('quantity') }}"
                                                class="form-control @error('quantity') is-invalid @enderror"
                                                placeholder="Enter Stock Quantity">
                                            @error('quantity')
                                                <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Status</label>
                                            <br>
                                            <input type="checkbox" name="status"
                                                class="@error('status') is-invalid @enderror" value="1" checked
                                                data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label for="exampleInputPassword1">Product Details</label>
                                            <textarea class="form-control textarea @error('description') is-invalid @enderror" name="description" id="summernote">{{ old('description') }}</textarea>
                                            @error('description')
                                                <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.card -->
                        <!-- right column -->
                        <div class="col-md-4">
                            <!-- Form Element sizes -->
                            <div class="card card-primary">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Main Thumbnail <span class="text-danger">*</span>
                                        </label><br>
                                        <input type="file" name="image" accept="image/*"
                                            class="dropify @error('image') is-invalid @enderror">
                                        @error('image')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div><br>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <button class="btn btn-info ml-2" type="submit">Submit</button>
                    </div>
                </form>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    @push('scripts')
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    <script src="{{ asset('public/admin') }}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>


    <script type="text/javascript">
        //ajax request send for collect childcategory
        $('.dropify').dropify(); //dropify image
        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });
    </script>
@endpush
@endsection
