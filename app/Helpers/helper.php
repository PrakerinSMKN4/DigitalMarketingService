<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use \App\Models\Paket;

if(!function_exists('isLogin')){
    function isLogin(){
        $curentUrl =  explode("/",$_SERVER['REQUEST_URI']);
        @$validateUrl = $curentUrl[1];
        $curentUrl = end($curentUrl);
        if(Auth::user() === null ){
            if(@$validateUrl == 'admin'){
                if($curentUrl != "login"){
                    header('Location: '. route('admin-login'));
                    exit;
                }
                return false;
            }else{
                if($curentUrl != "login"){
                    header('Location: '. route('/login'));
                    exit;
                }
            }
        }else{
            if(($curentUrl === "login" || $curentUrl === "register") && Auth::user()->role == User::SUPER_ADMIN){
                header('location: '. route('admin-dashboard'));
                exit;
            }else if(($curentUrl === "login" || $curentUrl === "register") && Auth::user()->role == User::CLIENT_ADMIN){
                header('location: '. route('/dashboard'));
                exit;
            }
            return true;
        }
    }
}

function checkIsSuperAdmin(){
    if(Auth::user()->role != User::SUPER_ADMIN){
        header('location: '. route('/') );
        die;
    }
}

function checkPackageExpiration(){
    if(Auth::user() != null){
        $paket = Paket::where('id_user', Auth::user()->id)->orderBy('created_at','desc')->first();
        if(!empty($paket)){
            if($paket->durasi < date('Y-m-d H:i:s')){
                Paket::Where('id', $paket->id)
                ->update(['status'=>'inactive', 'status_pembayaran' => '']);
            }
        }
    }
}

function checkHasLogin(){
    if(Auth::user() != null){
        header('Location: /dashboard');
        die;
    }
}
?>