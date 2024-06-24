@extends('layouts.layout03')

@section('title', 'Chi tiết tài khoản')

@section('body')
@parent
<form action="" method="POST" class="form-inline" role="form">
    <div class="form-group" style="margin-top: 10px;">
        <label class="sr-only" for="">label</label>
        <input type="text" class="form-control" id="" placeholder="Tìm kiếm">
        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
    </div>
</form>

<table class="table table-hover">
    <thead>
        <tr>
            <th>STT</th>
            <th>Image</th>
            <th>Username</th>
            <th>Fullname</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Loại</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $us)
        <tr>
            <td>{{ $us->id }}</td>
            <td>
                {{-- {{ $us->image }} --}}
                <img alt="Avatar" style="width:60px;" class="table-avatar" src="{{ asset('asset_ad/dist/img/avatar.png') }}">
            </td>
            <td>{{ $us->username }}</td>
            <td>{{ $us->fullname }}</td>
            <td>{{ $us->address }}</td>
            <td>{{ $us->email }}</td>
            <td>{{ $us->phonenumber }}</td>
            <td>{{ $us->role ? 'Admin' : 'Khách hàng' }}</td>
            <td>
                <a href="" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>Sửa</a>
                <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>Xóa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
