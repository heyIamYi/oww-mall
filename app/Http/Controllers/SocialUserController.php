<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialUserController extends Controller
{
    public function googleredirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googlecallback()
    {
        $user_data = Socialite::driver('google')->stateless()->user();

        // 註冊過直接登入,沒註冊過創建新使用者

        dd($user_data);
        $g_user = User::where('email', '=', $user_data->email)->find(1);
        dd($g_user);

        if ($g_user) {
            Auth::login($g_user);
            Auth::attempt(['email' => $g_user->email, 'password' =>  $g_user->password]);
            return redirect('/');
        } else {
            $uuid = Str::uuid()->toString();
            $g_user = User::create([
                'name' => $user_data->name,
                'email' => $user_data->email,
                'password' => Hash::make($uuid . now()),
                'user_type' => 'google',
                'power' => '1',
                'ac_type' => 'email',
            ]);

            $g_user->save();

            Auth::login($g_user);
            Auth::attempt(['email' => $g_user->email, 'password' =>  $g_user->password]);

            return redirect('/');
        }

    }
}
