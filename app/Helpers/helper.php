<?php

use Illuminate\Support\Facades\Auth;

if(!function_exists('isLogin')){
    function isLogin(){
        $curentUrl =  explode("/",$_SERVER['REQUEST_URI']);
        $curentUrl = end($curentUrl);
        if(Auth::user() === null){
            if($curentUrl != "login"){
                header('Location: /login');
                exit;
            }
            return false;
        }else{
            if($curentUrl === "login"){
                header('location: /dashboard');
                exit;
            }
            return true;
        }
    }
}
?>