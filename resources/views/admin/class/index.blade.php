@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Class') }}
                        <a href="{{route('create.class')}}" class="btn btn-primary btn-small" style="float: right;">Add New Class</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <td>SL</td>
                                    <td>Class Name</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($class as $key => $cData)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $cData->class_name }}</td>
                                        <td>
                                            <a href="{{route('show.class',$cData->id)}}" class="btn btn-success">Show</a>
                                            <a href="{{route('edit.class',$cData->id)}}" class="btn btn-success">Edit</a>
                                            <a href="{{route('delete.class',$cData->id)}}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $class->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
