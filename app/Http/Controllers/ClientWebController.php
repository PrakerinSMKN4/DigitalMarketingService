<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Product;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ClientWebController extends Controller
{
    public function home(){
        $user = User::Where('website', request()->getHost())->first();
        if($user->facebook != ""){
            $user->facebook = str_replace(' ', '.', $user->facebook);
        }
        $profile = Company::where('id_pemilik', $user->id)->first();
        $products = Product::where('id_user', $user->id)->orderBy('created_at', 'desc')->limit(3)->get();
        $services = Service::where('id_user', $user->id)->orderBy('created_at', 'desc')->limit(3)->get();
        return view("clientweb.landing", compact('products', 'services', 'profile', 'user'));
    }

    public function about(){
        $user = User::Where('website', request()->getHost())->first();
        $profile = Company::where('id_pemilik', $user->id)->first();
        return view("clientweb.about", compact('profile', 'user'));
    }

    public function service(){
        $user = User::Where('website', request()->getHost())->first();
        $profile = Company::where('id_pemilik', $user->id)->first();
        $products = Product::where('id_user', $user->id)->get();
        $services = Service::where('id_user', $user->id)->get();
        return view("clientweb.service", compact('products', 'services', 'profile', 'user'));
    }
}
