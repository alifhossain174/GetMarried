<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Socialite;
use Exception;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();
            $finduser = User::where('provider_id', $user->id)->first();

            if($finduser){
                Auth::login($finduser);

                if(session('last_visited_url') != '' && str_contains(session('last_visited_url'), 'add/to/liked/list')){
                    return redirect(session('last_visited_url'));
                }

                return redirect('/user/dashboard');

            } else{

                $newUserId = User::insertGetId([
                    'name' => $user->name,
                    'email' => $user->email,
                    'provider_name' => 'google',
                    'provider_id'=> $user->id,
                    'password' => Hash::make('GetMarried1234'),
                    'user_type' => 3,
                    'status' => 1,
                    'email_verified_at' => Carbon::now()
                ]);

                $userInfo = User::where('id', $newUserId)->first();

                Auth::login($userInfo);
                return redirect('/user/dashboard');
            }

        } catch (Exception $e) {
            // dd($e->getMessage());
            Toastr::error('Something Went Wrong', 'Failed to Login with Google');
            return back();
        }

    }
}
