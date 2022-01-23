<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.user.login');
    }

    public function authGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        $callback = Socialite::driver('google')->stateless()->user();
        $data = [
            'name' => $callback->getName(),
            'email' => $callback->getEmail(),
            'avatar' => $callback->getAvatar(),
            'created_at' => date('Y-m-d H:i:s', time())
        ];

        // Check if the user is already stored whether create the new one
        $user = User::firstOrCreate(['email' => $data['email']], $data);
        // Set to cookies
        Auth::login($user, true);

        return redirect(route('welcome'));
    }
}
