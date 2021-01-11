<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str as SupportStr;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('login');
    }

    public function postLoginAdmin(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            if(!Auth::user()->role == User::SUPER_ADMIN){
                return redirect('/admin/login')->with('error','Username / Password salah!');
            }else if(Auth::user()->role == User::SUPER_ADMIN){
                return redirect()->intended('/admin/dashboard');
            }else if(Auth::user()->role == User::CLIENT_ADMIN){
                return redirect('/dashboard');
            }
            
        }
        return redirect('/admin/login')->with('error','Username / Password salah!');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $data = [
                'secret' => env('RECAPTCHA_SECRET_KEY'),
                'response' => $request->get('recaptcha'),
                'remoteip' => $remoteip
            ];
        $options = [
                'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
                ]
            ];
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $resultJson = json_decode($result);

        if($resultJson->success != true){
            return redirect()->back()->with('error', 'Recaptcha Error');
        }if($resultJson->score > 0.3){
            if (Auth::attempt($credentials)) {
            
                // Authentication passed...
                if(Auth::user()->status_akun != 'terverifikasi'){
                    Auth::logout();
                    return redirect('/login')->with('error','Email belum diverifikasi');
                }
                date_default_timezone_set("Asia/Jakarta");
                session_start();
    
                $_SESSION['last_login'] = User::select('last_login')->where('id', Auth::id())->first()->last_login;
                User::where('id' , Auth::id())
                ->update(['last_login' => date('Y-m-d H:i:s')]);
                checkPackageExpiration();
                return redirect()->intended('/dashboard');
            }
            return redirect('/login')->with('error','Email / Password salah!');
        }else{
            return redirect()->back()->with('error', 'Anda Bot!');
        }
        
    }

    public function getRegister()
    {
        return view('register');
    }

    public function postRegisterAdmin(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required|string|min:4',
            'username'=> 'required|string',
            'email'=> 'required|email|unique:users',
            'no_hp'=> 'required|numeric',
            'password'=> 'required|min:6|same:confirmPassword'
        ]); 

        User::create([
            'name'=> $request->name,
            'username'=> $request->username,
            'email'=> $request->email,
            'role'=>'1',
            'no_handphone'=> $request->no_hp,
            'password'=> bcrypt($request->password)
        ]);

        //return redirect('login');
        if($request){
            return redirect('/admin/login')->with('success', 'Register Berhasil, silakan Login ');
         }else{
             return redirect('/admin/login')->with('error', 'Register Gagal');
         } 
    }

    public function postRegister(Request $request)
    {
        //
        //dd($request);
        $this->validate($request, [
            'name'=> 'required|string|min:4',
            'email'=> 'required|email|unique:users',
            'no_hp'=> 'required|numeric',
            'password'=> 'required|min:6|same:confirmPassword',
            'recaptcha'=> 'required'
        ]); 

        $token = SupportStr::random(50);

        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $data = [
                'secret' => env('RECAPTCHA_SECRET_KEY'),
                'response' => $request->get('recaptcha'),
                'remoteip' => $remoteip
            ];
        $options = [
                'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
                ]
            ];
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $resultJson = json_decode($result);
        if ($resultJson->success != true) {
                return back()->with('error', 'Recaptcha Error');
        }
        if ($resultJson->score >= 0.3) {
                $id = User::create([
                    'name'=> $request->name,
                    'email'=> $request->email,
                    'no_handphone'=> $request->no_hp,
                    'email_token' => $token,
                    'role' => '2',
                    'status_akun' => 'belum diverifikasi',
                    'password'=> bcrypt($request->password)
                ])->id;
                
                if($request){
                    $to_name = $request->email;
                    $to_email = $request->email;
                    $data = array('id' => $id, 'token' => $token );
                    Mail::send('emails.verifikasi', $data, function($message) use ($to_name, $to_email) {
                        $message->to($to_email, $to_name)
                        ->subject('Verifikasi Email');
                        $message->from(env('MAIL_USERNAME'),'Digital Marketing Service');
                    });
                    return redirect('/login')->with('success', 'Verifikasi Telah Dikirimkan Ke Email ' . $request->email);
                }else{
                    return redirect('/login')->with('error', 'Register Gagal');
                } 
        } else {
                return back()->with('error', 'Anda Bot!');
        }

        
    }

    public function logout()
    {
        $role = Auth::user()->role;
        Auth::logout();
        if($role == User::CLIENT_ADMIN){
            return redirect('/login');
        }
        return redirect('/admin/login');
    }
}
