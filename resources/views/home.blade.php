@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <br>
                    <a href="{{route('about.mine',Crypt::encryptString('7'))}}">About id</a>
                    <br>
                    <form action="{{route('store.pass')}}" method="POST">
                        @csrf
                        <div>
                            <label for="password">Password :</label>
                            <input type="password" name="password" id="password">
                        </div>
                        <div>
                            <input type="submit" value="Submit" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
