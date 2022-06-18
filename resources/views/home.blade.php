@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                  Hey, {{Auth::user()->name}} welcome for your come back.
                  <br>
                  <br>
                  <a href="{{route('index.class')}}" class="btn btn-primary">Class</a>
                  <a href="{{route('students.index')}}" class="btn btn-dark">Students</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
