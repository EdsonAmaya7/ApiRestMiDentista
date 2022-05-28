<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class FacebookLoginController extends Controller
{
    public function login() {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook() {
        return response()->json(Socialite::driver('facebook')->user());
    }
}
