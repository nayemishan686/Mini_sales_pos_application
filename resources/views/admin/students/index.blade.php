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
                        @if (session()->has('success'))
                            <strong class="text-success">{{ session()->get('success') }}</strong>
                        @endif
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
                                            <a href="{{route('students.show',$sData->id)}}" class="btn btn-success">View</a>
                                            <a href="{{route('students.edit',$sData->id)}}" class="btn btn-success">Edit</a>
                                            {{-- <a href="{{route('delete.class',$cData->id)}}" class="btn btn-danger">Delete</a> --}}
                                            <form action="{{route('students.destroy',$sData->id)}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="submit" value="Delete" class="btn btn-danger">
                                            </form>
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
