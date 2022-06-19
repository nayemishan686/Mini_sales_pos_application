@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Students') }}
                        <a href="{{route('students.index')}}" class="btn btn-primary btn-small" style="float: right;">All Students</a>
                    </div>

                    <div class="card-body">
                        @if (session()->has('success'))
                            <strong class="text-success">{{ session()->get('success') }}</strong>
                        @endif
                        <form action="{{ route('students.store') }}" method="POST" autocomplete="on">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{old('name')}}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="roll" class="form-label">Roll</label>
                                <input type="text" class="form-control  @error('roll') is-invalid @enderror" name="roll" value="{{old('roll')}}">
                                @error('roll')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="className" class="form-label">Class Name</label>
                                <select name="className" id="className" class="form-control  @error('className') is-invalid @enderror">
                                    <option value="0" selected disabled>Select One</option>
                                    @foreach ($class as $cData)
                                        <option value="{{$cData->id}}">{{$cData->class_name}}</option>
                                    @endforeach
                                </select>
                                @error('className')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="tel" class="form-control  @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}">
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="mail" class="form-label">E-mail</label>
                                <input type="email" class="form-control  @error('mail') is-invalid @enderror" name="mail" value="{{old('mail')}}">
                                @error('mail')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
