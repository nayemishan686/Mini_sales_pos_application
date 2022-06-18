@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Class') }}
                        <a href="{{ route('index.class') }}" class="btn btn-primary btn-small" style="float: right;">All
                            Class</a>
                    </div>

                    <div class="card-body">
                        @if (session()->has('success'))
                            <strong class="text-success">{{ session()->get('success') }}</strong>
                        @endif
                        <form action="{{ route('store.class') }}" method="POST" autocomplete="on">
                            @csrf
                            <div class="mb-3">
                                <label for="className" class="form-label">Class Name</label>
                                <input type="text" class="form-control @error('className') is-invalid @enderror"
                                    name="className" value="{{old('className')}}">
                                @error('className')
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
