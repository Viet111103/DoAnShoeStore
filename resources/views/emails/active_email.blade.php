<!DOCTYPE html>
<html>
<head>
    <title>Xác nhận đăng ký</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .content { max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px; }
        h1 { color: #333; }
        p { color: #555; }
    </style>
</head>
<body>
    
    <div class="content">
        <h1>Xin chào, {{ $name }}</h1>
        <p>Cảm ơn bạn đã đăng ký tại MyShopping. Để hoàn tất đăng ký, vui lòng sử dụng mã xác thực sau:</p>
        <p style="font-size: 24px; font-weight: bold; color: #333;">{{ $token }}</p>
        <p>Chúng tôi hy vọng sẽ sớm gặp lại bạn!</p>
        <p>Trân trọng,<br>Đội ngũ MyShopping</p>
    </div>
</body>
</html>
