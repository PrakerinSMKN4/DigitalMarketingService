<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            if(!Auth::user()->role == User::SUPER_ADMIN){
                return redirect('/admin/login')->with('error','Username / Password salah!');
            }
            return redirect()->intended('/admin/dashboard');
        }
        return redirect('/admin/login')->with('error','Username / Password salah!');
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

    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
}
