@extends('layouts.admin')

@section('admin_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                  Hey, {{Auth::user()->name}} welcome for your come back, You are an admin.
                  <br>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection