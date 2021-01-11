<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifikasiController extends Controller
{
    public function verifikasiEmail($id, $token){
        $user = User::where('email_token', $token)->first();
        if($user){
            $res = User::where('id', $id)->update(['status_akun' => 'terverifikasi']);
            if($res){
                return redirect()->route('/login')->with('success', 'Email Terverifikasi');
            }else{
                return redirect()->route('/login')->with('error', 'Email Gagal Diverifikasi');
            }
        }
        return redirect()->route('/login')->with('error', 'Gagal Verifikasi');
        
    }
}
