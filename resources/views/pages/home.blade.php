@extends('layouts.layout01')

@section('title', 'Trang chủ')

@section('navbar')
    @parent
    @auth
        Chào {{ Auth::user()->username }}
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <input type="submit" value="Đăng xuất">
        </form>
        <a href="{{ route('admin.acc.index') }}">Xem</a>
    @endauth
    <a href="{{ route('login.index') }}">Đăng Nhâp</a>

@endsection
