<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserVerify;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use SplSubject;

class UserController extends Controller
{
    // Menampilkan halaman login
    public function login()
    {
        return view('login');
    }

    public function dologin(Request $request)
    {
        // dd($request);

        $data=[
            'email'=>$request->email,
            'password'=>$request->password
        ];

        if(Auth::attempt($data)){
            return redirect()->route('dashboard')->with('success', 'Selamat datang di dashboard');
        } else {
            return redirect()->route('login')->with('error', 'Username dan Password Tidak Sesuai')->withInput();
        }

        return view('login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }


    public function forgotpassword(){

        return view('forgotpassword');
    }


    public function doforgotpassword(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.exists' => 'Email tidak ditemukan dalam database.',
        ]);

        // dd($request);
        //hapus email lama di tabel password_reset_token
        UserVerify::where('email',  $request->email)->delete();


        $token = Str::uuid();
        $data = [
            'email'=>$request->email,
            'token'=>$token
        ];

        UserVerify::create($data);

        Mail::send('mail.userReset', ['token' => $token], function($message) use ($request) {
            $message->to($request->email);
            $message->Subject('Reset Password');
        });

        return redirect()->route("forgotpassword")->with("send", "Link Reset Password sudah dikirim ke email " . $request->email)->withInput();
    }

    public function resetpassword($token){
        return view('reset-password', compact('token'));

    }
    public function doResetPassword(Request $request){
        $request ->validate([
            'password' => 'required|string|min:8',
            'confirm_password'=> 'required_with:password|same:password'
        ], [
            'password.required' => 'Password wajib diisi.',
            'password.string' => 'Password harus berupa teks.',
            'password.min' => 'Password harus memiliki minimal 8 karakter.',
            'confirm_password.required_with' => 'Konfirmasi password harus diisi jika password diisi.',
            'confirm_password.same' => 'Konfirmasi password harus sama dengan password.',
        ]);

        $dataUser= UserVerify::where("token", $request->input("token"))->first();

        // print_r($dataUser);
        // dd($dataUser);

        if(!$dataUser){
            return redirect()->back()->withInput()->withErrors('Token Tidak Valid');
        }

        $email = $dataUser->email;
        $data = [
            'password' => bcrypt($request->password),
            'email_verified_at' => Carbon::now()
        ];
        
        User::where('email', $email)->update($data);

        //hapus data token pada tabel agar tidak terjadi eror saat ingin reset password kembali
        UserVerify::where('email', $email)->delete();
        return redirect('login')->with('succesReset', "Password Berhasil Diperbarui");

    }
}