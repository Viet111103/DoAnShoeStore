@extends('layouts.layout01')

@section('title', 'Đăng nhập')

@section('navbar')
    @parent
    <form method="POST" action="{{ route('login.index') }}">
        @csrf
        <div class="login-page">
            <div class="form">
              <form class="login-form">
                <input name="email" type="text" placeholder="email"/>
                @if ($errors->has('email')) {{ $errors->first('email')}} <br> @endif
                <input name="password" type="password" placeholder="password"/>
                @if ($errors->has('password')) {{ $errors->first('password')}} <br> @endif
                <button type="submit" class="btn btn-primary">Login</button>
                <p class="message">Not registered? <a href="{{ route('register.index') }}">Create an account</a></p>
              </form>
            </div>
        </div>
    </form>

@endsection


