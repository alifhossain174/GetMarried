<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\SmsGateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserVerificationMail;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

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

                $smsGateway = SmsGateway::where('status', 1)->first();
                if($smsGateway && $smsGateway->provider_name == 'Reve'){
                    $response = Http::get($smsGateway->api_endpoint, [
                        'apikey' => $smsGateway->api_key,
                        'secretkey' => $smsGateway->secret_key,
                        "callerID" => $smsGateway->sender_id,
                        "toUser" => $userInfo->contact,
                        "messageContent" => "Verification Code is : ". $randomCode
                    ]);

                    if($response->status() != 200){
                        Toastr::error('Something Went Wrong', 'Failed to send SMS');
                        return back();
                    }

                } elseif($smsGateway && $smsGateway->provider_name == 'ElitBuzz'){

                    $response = Http::get($smsGateway->api_endpoint, [
                        'api_key' => $smsGateway->api_key,
                        "type" => "text",
                        "contacts" => $userInfo->contact, //“88017xxxxxxxx,88018xxxxxxxx”
                        "senderid" => $smsGateway->sender_id,
                        "msg" => "Verification Code is : ". $randomCode
                    ]);

                    if($response->status() != 200){
                        Toastr::error('Something Went Wrong', 'Failed to send SMS');
                        return back();
                    }

                } else {
                    Toastr::error('No SMS Gateway is Active Now', 'Failed to send SMS');
                    return back();
                }

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

            if($userInfo->email){
                $mailData = array();
                $mailData['code'] = $randomCode;
                Mail::to(trim($userInfo->email))->send(new UserVerificationMail($mailData));
            } else {

                $smsGateway = SmsGateway::where('status', 1)->first();
                if($smsGateway && $smsGateway->provider_name == 'Reve'){
                    $response = Http::get($smsGateway->api_endpoint, [
                        'apikey' => $smsGateway->api_key,
                        'secretkey' => $smsGateway->secret_key,
                        "callerID" => $smsGateway->sender_id,
                        "toUser" => $userInfo->contact,
                        "messageContent" => "Verification Code is : ". $randomCode
                    ]);

                    if($response->status() != 200){
                        Toastr::error('Something Went Wrong', 'Failed to send SMS');
                        return back();
                    }

                } elseif($smsGateway && $smsGateway->provider_name == 'ElitBuzz'){

                    $response = Http::get($smsGateway->api_endpoint, [
                        'api_key' => $smsGateway->api_key,
                        "type" => "text",
                        "contacts" => $userInfo->contact, //“88017xxxxxxxx,88018xxxxxxxx”
                        "senderid" => $smsGateway->sender_id,
                        "msg" => "Verification Code is : ". $randomCode
                    ]);

                    if($response->status() != 200){
                        Toastr::error('Something Went Wrong', 'Failed to send SMS');
                        return back();
                    }

                } else {
                    Toastr::error('No SMS Gateway is Active Now', 'Failed to send SMS');
                    return back();
                }

            }

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

    public function userForgetPassword(){
        return view('frontend.forget_password');
    }

    public function sendForgetPasswordCode(Request $request){
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
        ]);

        if (filter_var($request->username, FILTER_VALIDATE_EMAIL)) {

            $randomCode = rand(100000, 999999);
            $userInfo = User::where('email', $request->username)->first();
            if($userInfo){
                User::where('id', $userInfo->id)->update([
                    'verification_code' => $randomCode
                ]);

                $mailData = array();
                $mailData['code'] = $randomCode;
                Mail::to(trim($userInfo->email))->send(new UserVerificationMail($mailData));
                session(['username' => $request->username]);

                Toastr::success('Password Reset Code Sent', 'Code Sent Successfully');
                // return view('frontend.change_password');
                return redirect('/new/password');
            } else {
                Toastr::error('No Account Found', '! Failed');
                return back();
            }

        } else {

            $randomCode = rand(100000, 999999);
            $userInfo = User::where('contact', $request->username)->first();
            if($userInfo){
                User::where('id', $userInfo->id)->update([
                    'verification_code' => $randomCode
                ]);

                $smsGateway = SmsGateway::where('status', 1)->first();
                if($smsGateway && $smsGateway->provider_name == 'Reve'){
                    $response = Http::get($smsGateway->api_endpoint, [
                        'apikey' => $smsGateway->api_key,
                        'secretkey' => $smsGateway->secret_key,
                        "callerID" => $smsGateway->sender_id,
                        "toUser" => $userInfo->contact,
                        "messageContent" => "Verification Code is : ". $randomCode
                    ]);

                    if($response->status() != 200){
                        Toastr::error('Something Went Wrong', 'Failed to send SMS');
                        return back();
                    }

                } elseif($smsGateway && $smsGateway->provider_name == 'ElitBuzz'){

                    $response = Http::get($smsGateway->api_endpoint, [
                        'api_key' => $smsGateway->api_key,
                        "type" => "text",
                        "contacts" => $userInfo->contact, //“88017xxxxxxxx,88018xxxxxxxx”
                        "senderid" => $smsGateway->sender_id,
                        "msg" => "Verification Code is : ". $randomCode
                    ]);

                    if($response->status() != 200){
                        Toastr::error('Something Went Wrong', 'Failed to send SMS');
                        return back();
                    }

                } else {
                    Toastr::error('No SMS Gateway is Active Now', 'Failed to send SMS');
                    return back();
                }

                session(['username' => $request->username]);

                Toastr::success('Password Reset Code Sent', 'Code Sent Successfully');
                // return view('frontend.change_password');
                return redirect('/new/password');
            } else {
                Toastr::error('No Account Found', '! Failed');
                return back();
            }
        }
    }

    public function newPasswordPage(){
        return view('frontend.change_password');
    }

    public function changeForgetPassword(Request $request){

        $request->validate([
            'code' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'max:255', 'min:8'],
        ]);

        $username = session('username');
        $code = $request->code;
        $password = $request->password;

        $userInfo = User::where('email', $username)->where('verification_code', $code)->first();
        if($userInfo){
            $userInfo->password = Hash::make($password);
            $userInfo->save();
            Auth::login($userInfo);

            Toastr::success('Successfully Changed the Password', 'Password Changed');
            return redirect('user/dashboard');
        } else {

            $userInfo = User::where('contact', $username)->where('verification_code', $code)->first();
            if($userInfo){
                $userInfo->password = Hash::make($password);
                $userInfo->save();
                Auth::login($userInfo);

                Toastr::success('Successfully Changed the Password', 'Password Changed');
                return redirect('user/dashboard');
            } else {
                Toastr::error('Wrong Verification Code', 'Try Again');
                return back();
            }
        }

    }
}
