<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        $authUser = User::firstOrNew(['provider_id'=>$user->id]);

        $authUser->name = $user->name;
        $authUser->email = $user->email;
        $authUser->provider = $provider;

        $authUser->save();

        auth()->login($authUser);

        return redirect('home'); //Rederict naar een nieuwe pagina. Zo kun je zien dat het autorisatieproces succesvol is.
    }
}
