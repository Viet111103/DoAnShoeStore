@extends('layouts.layout01')

@section('title', 'Đăng ký')

@section('navbar')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <form method="POST" action="{{ route('register.submit') }}">
        @csrf
        <div class="login-page">
            <div class="form">
              <form class="register-form">
                <input name="username" type="text" placeholder="Username"/>
                @if ($errors->has('username')) {{ $errors->first('username')}} <br> @endif
                <input name="fullname" type="text" placeholder="Fullname"/>
                @if ($errors->has('fullname')) {{ $errors->first('fullname')}} <br> @endif
                <input name="phonenumber" type="text" placeholder="Phone"/>
                @if ($errors->has('phonenumber')) {{ $errors->first('phonenumber')}} <br> @endif
                <input name="address" type="text" placeholder="Address"/>
                @if ($errors->has('address')) {{ $errors->first('address')}} <br> @endif
                <input name="email" type="text" placeholder="Email"/>
                @if ($errors->has('email')) {{ $errors->first('email')}} <br> @endif
                <input name="password" type="password" placeholder="Password"/>
                @if ($errors->has('password')) {{ $errors->first('password')}} <br> @endif
                <input name="password_confirmation" type="password" placeholder="Confirm password"/>
                <button type="submit" class="btn btn-primary">Đăng ký</button>
                <p class="message">Already registered? <a href="{{ route('login.index') }}">Đăng nhập</a></p>
              </form>
            </div>
        </div>
    </form>
@endsection
