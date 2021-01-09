<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;

if(!function_exists('isLogin')){
    function isLogin(){
        $curentUrl =  explode("/",$_SERVER['REQUEST_URI']);
        $curentUrl = end($curentUrl);
        if(Auth::user() === null){
            if($curentUrl != "login"){
                header('Location: /admin/login');
                exit;
            }
            return false;
        }else{
            if($curentUrl === "login" && Auth::user()->role == User::SUPER_ADMIN){
                header('location: /admin/dashboard');
                exit;
            }
            return true;
        }
    }
}
?>