<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function login()
    {
        return Socialite::driver('github')->redirect();
    }

    public function redirect()
    {
        $socialUser = Socialite::driver('github')->user();

        $user = User::firstOrCreate(
            [
                'provider_id' => $socialUser->getId(),
            ],
            [
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
            ]
        );
        // dd($user);

        //auth->user

        Auth::login($user, true);

        //redirect to home
        return redirect()->route('pages.index');

    }


    //     public function callback()
//     {
//         // return view('socialite.callback');
//     }
}
