<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{

    public function index()
    {
        if (!$user = Auth::user()) {
            return Socialite::driver('yandex')->redirect();
        } else {
            return Redirect::to('/');
        }
    }

    public function callback()
    {
        try {
            $userYandex = Socialite::driver('yandex')->user();
            if ($userYandex) {

                if (!$user = User::where('yandex_id', $userYandex->id)->first()) {
                    $user = User::create(
                        [
                            'yandex_id' => $userYandex->id,
                            'token' => $userYandex->token,
                            'refreshToken' => $userYandex->refreshToken,
                            'name' => $userYandex->user['real_name']
                        ]
                    );
                }
                Auth::login($user, true);
            }
        }catch (\Exception $ex){

        }
        return Redirect::to('/');
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
}
