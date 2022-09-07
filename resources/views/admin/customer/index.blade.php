@extends('layouts.admin')

@section('admin_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Customer Table</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                                Add New
                            </button>
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
                                    <h3 class="card-title">All Customer</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="" class="table table-bordered table-striped table-sm ytable">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Customer Name</th>
                                                <th>Phone Nuber</th>
                                                <th>E-mail</th>
                                                <th>Address</th>
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

        <!-- Child Category Add Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Customer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('customer.store') }}" method="POST" id="add_form">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="customer_name">Customer Name</label>
                                <input type="text" class="form-control" name="customer_name" id="customer_name" placeholder="Enter Customer name" required>
                            </div>                        
                            <div class="form-group">
                                <label for="phone">Customer Phone</label>
                                <input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter Customer Phone No" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Customer E-mail</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Customer E-mail">
                            </div>
                            <div class="form-group">
                                <label for="address">Customer Address</label>
                                <textarea class="form-control" name="address" id="" cols="30" rows="5" required></textarea>
                                <small class="text-danger">Enter Customer Address here</small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="Submit" class="btn btn-primary"> <span class="d-none loader"><i
                                        class="fas fa-spinner"></i> Loading..</span> <span class="submit_btn"> Submit
                                </span> </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- SubCategory Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Coupon</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="modal_body">

                    </div>
                </div>
            </div>
        </div>




        <!-- Category Index AJAX -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript">
        // Coupon table index
            $(function coupon() {
                 table = $('.ytable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('customer.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'customer_name',
                            name: 'customer_name'
                        },
                        {
                            data: 'phone',
                            name: 'phone'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'address',
                            name: 'address'
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

            //Customer add with ajax
            $('#add_form').submit(function(e){
                    e.preventDefault();
                    var url = $(this).attr('action');
                    var request = $(this).serialize();
                    $.ajax({
                        url: url,
                        type: 'post',
                        data: request,
                        success:function(data){
                            toastr.success(data);
                            $("#addModal").modal('hide');
                            $('#add_form')[0].reset();
                            table.ajax.reload();
                        }
                    });
                }); 

            // Edit Coupon
            $('body').on('click', '.edit', function(data) {
                let customer_id = $(this).data('id');
                $.get("customer/edit/" + customer_id, function(data) {
                    $("#modal_body").html(data);
                });
            });

            //Button effect 
            $('#add_form').on('submit', function() {
                $('.loader').removeClass('d-none')
                $('.submit_btn').addClass('d-none')
            })
        </script>

        {{-- Delete with ajax --}}
        <script type="text/javascript">
            $(document).ready(function() {
                // swal open
                $(document).on("click", "#delete", function(e) {
                    e.preventDefault();
                    var url = $(this).attr("href");
                    $("#deleted_form").attr('action',url);
                    swal({
                            title: "Are you Want to delete?",
                            text: "Once Delete, This will be Permanently Delete!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                $("#deleted_form").submit();
                            } else {
                                swal("Safe Data!");
                            }
                        });
                });

                // Data passed through here
                $('#deleted_form').submit(function(e){
                    e.preventDefault();
                    var url = $(this).attr('action');
                    var request = $(this).serialize();
                    $.ajax({
                        url: url,
                        type: 'post',
                        data: request,
                        success:function(data){
                            toastr.success(data);
                            $('#deleted_form')[0].reset();
                            table.ajax.reload();
                        }
                    });
                });
            });
        </script>
    @endsection