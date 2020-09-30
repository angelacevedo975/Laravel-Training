<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function redirectToProvider(Request $request)
    {
        $provider= $request->social;
        return Socialite::driver( $provider )->redirect();
    }

    public function handleProviderCallback(Request $request)
    {
        $provider= $request->social;
        $user = Socialite::driver($provider)->user();
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
                $provider."_id"=> $user->id,
                'password' => encrypt('')
            ]);
            //login as the new user
            Auth::login($newUser);
            // go to the dashboard
            return redirect('/dashboard');
        }
    }

}
