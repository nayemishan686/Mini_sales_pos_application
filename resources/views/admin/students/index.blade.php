@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Class') }}
                        <a href="{{route('students.create')}}" class="btn btn-primary btn-small" style="float: right;">Add New Student</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <td>SL</td>
                                    <td>Name</td>
                                    <td>Roll</td>
                                    <td>Class Name</td>
                                    <td>Phone</td>
                                    <td>Mail</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $key => $sData)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $sData->name }}</td>
                                        <td>{{ $sData->roll }}</td>
                                        <td>{{ $sData->Class_id }}</td>
                                        <td>{{ $sData->phone }}</td>
                                        <td>{{ $sData->email }}</td>
                                        <td>
                                            <a href="" class="btn btn-success">Edit</a>
                                            <a href="{{route('delete.class',$cData->id)}}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
