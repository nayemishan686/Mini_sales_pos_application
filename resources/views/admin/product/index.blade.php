@extends('layouts.admin')

@section('admin_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Product Table</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <!-- Button trigger modal -->
                            <a href="{{ route('product.create') }}" class="btn btn-primary">
                                Add New
                            </a>
                        </ol>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- /.card -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">All Product</h3>
                                </div>
                                {{-- <div class="row p-2">
                                    <div class="form-group col-3">
                                        <label for="category_id">Category</label>
                                        <select class="form-control submitable" name="category_id" id="category_id">
                                            <option value="">All</option>
                                            @foreach ($category as $row)
                                                <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-3">
                                        <label for="brand_id">Brand</label>
                                        <select name="brand_id" id="brand_id" class="form-control submitable">
                                            <option value="">All</option>
                                            @foreach ($brand as $row)
                                                <option value="{{ $row->id }}">{{ $row->brand_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-3">
                                        <label for="warehouse_id">Warehouse</label>
                                        <select name="warehouse_id" id="warehouse_id"
                                            class="form-control submitable submitable">
                                            <option value="">All</option>
                                            @foreach ($warehouse as $row)
                                                <option value="{{ $row->id }}">{{ $row->warehouse_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-3">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control submitable">
                                            <option>All</option>
                                            <option value="1">Active</option>
                                            <option value="0">Deactive</option>
                                        </select>
                                    </div>
                                </div> --}}
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="" class="table table-bordered table-striped table-sm ytable">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Purchase_price</th>
                                                <th>Sales_price</th>
                                                <th>Quantity</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                    <form action="" method="delete" id="deleted_form">
                                        @csrf @method('DELETE')
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>



        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript">
            // Product table index
            $(function product() {
                table = $('.ytable').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "searching": true,
                    "ajax": {
                        "url": "{{ route('product.index') }}",                       
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'image',
                            name: 'image'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'purchase_price',
                            name: 'purchase_price'
                        },
                        {
                            data: 'sales_price',
                            name: 'sales_price'
                        },
                        {
                            data: 'quantity',
                            name: 'quantity'
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            searchable: true,
                            orderable: true
                        },
                    ]
                })
            })
        </script>

        {{-- Active & deactive Featured,Today_deal,Status --}}
        <script type="text/javascript">
            $(document).ready(function() {
                // Deactive Status
                $('body').on('click', '.status_deactive', function(data) {
                    let status_id = $(this).data('id');
                    var url = "{{ url('product/deactive_status') }}/" + status_id;
                    $.ajax({
                        url: url,
                        type: 'get',
                        success: function(data) {
                            toastr.success(data);
                            table.ajax.reload();
                        }
                    });
                });

                // Active Featured
                $('body').on('click', '.status_active', function(data) {
                    let status_id = $(this).data('id');
                    var url = "{{ url('product/active_status') }}/" + status_id;
                    $.ajax({
                        url: url,
                        type: 'get',
                        success: function(data) {
                            toastr.success(data);
                            table.ajax.reload();
                        }
                    });
                });


            });
        </script>

        {{-- Delete with ajax --}}
        <script type="text/javascript">
            $(document).ready(function() {
                // swal open
                $(document).on("click", "#delete", function(e) {
                    e.preventDefault();
                    var url = $(this).attr("href");
                    $("#deleted_form").attr('action', url);
                    swal({
                            title: "Are you Want to delete this product?",
                            text: "Once Delete, This will be Permanently Delete!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                $("#deleted_form").submit();
                            } else {
                                swal("Safe Data");
                            }
                        })
                })



                // Data passed through here
                $('#deleted_form').submit(function(e) {
                    e.preventDefault();
                    var url = $(this).attr('action');
                    var request = $(this).serialize();
                    $.ajax({
                        url: url,
                        type: 'post',
                        data: request,
                        success: function(data) {
                            toastr.success(data);
                            $('#deleted_form')[0].reset();
                            table.ajax.reload();
                        }
                    });
                });
            });

            //submitable class call for every change
            $(document).on('change', '.submitable', function() {
                $('.ytable').DataTable().ajax.reload();
            });
        </script>
    @endsection
