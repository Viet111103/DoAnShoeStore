<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;

class LoginController extends Controller
{
    public function show(){
        return view('pages.login');
    }
    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Tài khoản hoặc mật khẩu không chính xác!',
        ])->onlyInput('email');
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function showregister(){
        return view('pages.register');
    }

    public function register(Request $request){
        $data = $request->validate([
            'username' => ['required', 'string', 'unique:'.User::class, 'max:100'],
            'fullname' => ['required', 'string', 'max:255'],
            'phonenumber' => ['required', 'string', 'starts_with:0', 'max:10'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:200', 'unique:'.User::class],
            'address' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->letters()->numbers()->symbols()],
        ],[
            //thông báo email
            'email.required' => 'Bạn cần nhập địa chỉ email để tiếp tục!',
            'email.email' => 'Địa chỉ email không hợp lệ!',
            'email.unique' => 'Địa chỉ email đã tồn tại!',
            //thông báo username
            'username.unique' => 'Tên tài khoản đã tồi tại!',
            'username.required' => 'Bạn cần nhập lại tên người dùng!',
            // thông báo số điện thoại
            'phonenumber.required' => 'Bạn cần nhập số điện thoại!',
            'phonenumber.starts_with' => 'Số điện thoại không hợp lệ!',
            'phonenumber.max' => 'Số điện thoại không hợp lệ!',
            //Thông báo password
            'password.required' => 'Bạn cần nhập mật khẩu!',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp!',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password.mixed_case' => 'Mật khẩu phải chứa cả chữ thường và chữ hoa.',
            'password.letters' => 'Mật khẩu phải chứa ít nhất một ký tự chữ.',
            'password.numbers' => 'Mật khẩu phải chứa ít nhất một chữ số.',
            'password.symbols' => 'Mật khẩu phải chứa ít nhất một ký tự đặc biệt.',
        ]);

        $token = rand(100000, 999999);
        $tokenCreationTime = now();
        $name = $request->username;
        Mail::send('emails.active_email',compact('name','token'),function($email) use($request, $name, $token,){
            $email->subject('MyShopping - Mã xác thực');
            $email->to($request->email, $name,$token);
        });
        Session::put('user_registration', $data);
        Session::put('verification_token', $token);
        Session::put('verification_token_created_at', $tokenCreationTime);

        return redirect()->route('register.verify');
    }

    public function showverify(){
        return view('emails.veriry_email');
    }

    public function verifyToken(Request $request){
        $request->validate([
            'token' => 'required|Integer|min:6', // Kiểm tra mã token
        ],[
            'token.required' => 'Bạn cần nhập mã xác nhận!',
            'token.min' => 'Mã xác nhận phải có đúng 6 ký tự!',
        ]);
        $tokenCreationTime = Session::get('verification_token_created_at');

        // Kiểm tra nếu đã quá 5 phút kể từ khi mã xác nhận được tạo ra
        if ($tokenCreationTime && now()->diffInMinutes($tokenCreationTime) > 2) {
            Session::forget(['verification_token', 'verification_token_created_at']);
            return back()->withErrors(['token' => 'Mã xác nhận đã hết hạn!']);
        }else{
            if($request->token == Session::get('verification_token')){
                $userData = Session::get('user_registration');
                User::create([
                    'username' => $userData['username'],
                    'fullname' => $userData['fullname'],
                    'phonenumber' => $userData['phonenumber'],
                    'email' => $userData['email'],
                    'address' => $userData['address'],
                    'password' => Hash::make($userData['password']), // Mã hóa mật khẩu trước khi lưu
                ]);
                Session::forget(['user_registration', 'verification_token']);
                return redirect()->route('register.index')->with('success', 'Đăng ký thành công!');
            }
        }
        return back()->withErrors(['token' => 'Mã xác nhận không hợp lệ!']);
    }


}
