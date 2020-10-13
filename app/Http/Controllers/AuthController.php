<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function handleProviderCallback($driver)
    {
        try {
            $user = Socialite::driver($driver)->user();

    
            $create = User::firstOrCreate([
                'email' => $user->email
            ], [
                'socialite_name' => $driver,
                'socialite_id' => $user->id,
                'name' => $user->getName(),
                'email_verified_at' => now(),
            ]);
    
            Auth::login($create, true);
            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            return redirect()->route('login');
        }
    }

    public function getLogin()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/');
        }
        return redirect('/login')->with('error','Username / Password salah!');

      
    }

    public function getRegister()
    {
        return view('register');
    }

    public function postRegister(Request $request)
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
            'no_hp'=> $request->no_hp,
            'password'=> bcrypt($request->password)
        ]);

        //return redirect('login');
        if($request){
            return redirect('login')->with('success', 'Register Berhasil, silakan Login ');
         }else{
             return redirect('login')->with('error', 'Register Gagal');
         } 
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
