<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAuth extends Controller
{
    //
    function userLogin(Request $req)
    {
        $data = $req->input();
        $req->session()->put('nama_user',$data['user']);
        return redirect('profile');
    }
}
