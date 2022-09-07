<form action="{{ route('customer.update') }}" method="POST" id="edit_form">
    @csrf
    <form id="add_form">
        {{ csrf_field() }}
    <div class="modal-body">
        <div class="form-group">
            <label for="customer_name">Customer Name</label>
            <input type="text" class="form-control" name="customer_name" id="customer_name" value="{{$customer->customer_name}}" required>
        </div> 
        <input type="hidden" name="old_id" value="{{$customer->id}}">                 
        <div class="form-group">
            <label for="phone">Customer Phone</label>
            <input type="tel" class="form-control" name="phone" id="phone" value="{{$customer->phone}}" required>
        </div>
        <div class="form-group">
            <label for="email">Customer E-mail</label>
            <input type="email" class="form-control" name="email" id="email" value="{{$customer->email}}">
        </div>
        <div class="form-group">
            <label for="address">Customer Address</label>
            <textarea class="form-control" name="address" id="" cols="30" rows="5" required>
                {{$customer->address}}
            </textarea>
            <small class="text-danger">Enter Customer Address here</small>
        </div>
    </div>
    <div class="modal-footer">
        <button type="Submit" class="btn btn-primary"> <span class="d-none loader"><i
                    class="fas fa-spinner"></i> Loading..</span> <span class="submit_btn"> Submit
            </span> </button>
    </div>
</form>
<script type="text/javascript">
    $('#edit_form').submit(function(e) {
        e.preventDefault();
        var url = $(this).attr('action');
        var request = $(this).serialize();
        $.ajax({
            url: url,
            type: 'post',
            data: request,
            success: function(data) {
                toastr.success(data);
                $("#editModal").modal('hide');
                $('#edit_form')[0].reset();
                table.ajax.reload();
            }
        });
    });
</script>