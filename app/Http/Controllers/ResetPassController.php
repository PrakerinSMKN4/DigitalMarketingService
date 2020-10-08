<?php

namespace App\Http\Controllers;
session_start();

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Exception;
use App\OtpCode;

class ResetPassController extends Controller
{
    public function sendOTP(Request $request)
    {
        
        try{
            $this->randomOTPCode();
            Mail::send('Email/emailContent', ['nama' => 'Digital Marketing Service','pesan' => $_SESSION['otp_code']], function ($message) use($request)
            {
                $message->subject("Forgot Password");
                $message->from('DMS@gmail.com', 'Digital Marketing Service');
                $message->to($request->email);
            });
            return response(['status' => true]);
        }
        catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
    }

    public function randomOTPCode(){
        $_SESSION['otp_code'] = random_int(1000,9999);
    }

    public function validateOTP(Request $request){
        if($request->otp == $_SESSION['otp_code']){
            return response(['status' => true]);
        }
        return response(['status' => false, 'kode' => $_SESSION['otp_code']]);
    }

    public function changePassword(Request $request){
        try{
            User::where('email',$request->email)->update(["password" => bcrypt($request->password)]);
            return response(['status' => true, 'message' => 'Password berhasil diubah']);
        }catch(Exception $e){
            return response(['status' => false, 'message',"Password gagal diubah"]);
        }
    }


}
