<!DOCTYPE html>
<html>
<head>
    <title>Xác nhận đăng ký</title>
</head>
<body>
    @if ($errors->has('token'))
        <div class="alert alert-errors">
            {{ $errors->first('token') }}
        </div>
    @endif
    <h1>Xác nhận đăng ký</h1>
    <form method="POST" action="{{ route('verify.submit') }}">
        @csrf
        <label for="token">Nhập mã xác nhận đã gửi đến email của bạn:</label><br>
        <input type="text" name="token" id="token" required>

        <br><br>
        <button type="submit">Xác nhận</button>
    </form>
</body>
</html>
