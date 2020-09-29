<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $finduser = User::where('email', $user->email)->first();
        if($finduser){
            //if the user exists, login and show dashboard
            Auth::login($finduser);
            return redirect('/dashboard');
        }else{
            //user is not yet created, so create first
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'facebook_id'=> $user->id,
                'password' => encrypt('')
            ]);
            //login as the new user
            Auth::login($newUser);
            // go to the dashboard
            return redirect('/dashboard');
        }
    }




    public function redirectToProvider_google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback_google()
    {
        $user = Socialite::driver('google')->user();
        $finduser = User::where('email', $user->email)->first();
        if($finduser){
            //if the user exists, login and show dashboard
            Auth::login($finduser);
            return redirect('/dashboard');
        }else{
            //user is not yet created, so create first
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id'=> $user->id,
                'password' => encrypt('')
            ]);
            //login as the new user
            Auth::login($newUser);
            // go to the dashboard
            return redirect('/dashboard');
        }
    }

}
