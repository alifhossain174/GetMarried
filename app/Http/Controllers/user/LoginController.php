<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserVerificationMail;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\User;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function userLogin(){
        if(!Auth::user()){
            return view('frontend.auth.login');
        } else {
            return redirect('user/dashboard');
        }
    }

    public function userRegister(){
        return view('frontend.auth.register');
    }

    public function userVerification(){
        $randomCode = rand(100000, 999999);
        $userInfo = Auth::user();

        if(!$userInfo->email_verified_at && !$userInfo->verification_code){

            User::where('id', $userInfo->id)->update([
                'verification_code' => $randomCode
            ]);

            if($userInfo->email){
                $mailData = array();
                $mailData['code'] = $randomCode;
                Mail::to(trim($userInfo->email))->send(new UserVerificationMail($mailData));
            } else {
                // send otp to mobile no
            }

            return view('verification.notice');

        } elseif(!$userInfo->email_verified_at && $userInfo->verification_code){
            return view('verification.notice');
        }
         else {
            return redirect('/user/dashboard');
        }

    }

    public function userVerificationResend(){
        $randomCode = rand(100000, 999999);
        $userInfo = Auth::user();

        if(!$userInfo->email_verified_at){

            User::where('id', $userInfo->id)->update([
                'verification_code' => $randomCode
            ]);

            $mailData = array();
            $mailData['code'] = $randomCode;
            Mail::to(trim($userInfo->email))->send(new UserVerificationMail($mailData));

            Toastr::success('Verification Code Sent', 'Resend Verification Code');
            return back();

        } else {
            return redirect('/user/dashboard');
        }

    }

    public function userVerifyCheck(Request $request){
        $verificationCode = '';
        foreach($request->code as $code){
            $verificationCode .= $code;
        }

        $userInfo = Auth::user();
        if($userInfo->verification_code == $verificationCode){
            User::where('id', $userInfo->id)->update([
                'email_verified_at' => Carbon::now()
            ]);
            Toastr::success('User Verification Complete', 'Successfully Verified');
            return redirect('/user/dashboard');
        } else {
            Toastr::error('Wrong Verification Code', 'Failed');
            return back();
        }

    }
}
