<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\RecoveryMsg;
use App\Models\User;
use App\Models\UserEmailHash;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return string
     * @throws Exception
     */

    public function login(Request $request): string
    {
        $credentials = $request->validate([
            'login' => ['required'],

            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return "/admin/dashboard";
        }
        throw new Exception('Неверный логин или пароль', 403);
    }

    /**
     * @return RedirectResponse
     */
    protected function authenticated(): RedirectResponse
    {
        return redirect()->intended();
    }



    public function recovery(Request $request)
    {
        $email = $request->get('email');
        $hash = Str::random(40);
        $user = User::where(['email' => $email])->first();
        $userEmailHash = new UserEmailHash();
        $userEmailHash->user_id = $user->id;
        $userEmailHash->hash_reset = $hash;
        $userEmailHash->is_used = 0;
        $userEmailHash->save();
        if ($user)
            Mail::to($email)->send(new RecoveryMsg($userEmailHash));
        else
            throw new Exception('Email не найден.', 404);
    }

    public function resetPassword(Request $request)
    {
        $hash = $request->get('hash');
        $userEmailHash = UserEmailHash::where(['hash_reset' => $hash, 'is_used' => 0])->first();
        if (!$userEmailHash) return redirect('/404');
        $userEmailHash->is_used = 1;
        $userEmailHash->save();
        return view('public.auth.reset', ['hash' => $hash]);
    }

    public function setPassword(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'password' => 'required|confirmed',
        ]);
        if ($validated->fails()) {
            throw new Exception($validated->errors()->first(), 402);
        }

        $hash = $request->get('hash');
        $password = $request->get('password');
        $userEmailHash = UserEmailHash::where(['hash_reset' => $hash])->first();
        $userEmailHash->user->password = Hash::make($password);
        $userEmailHash->user->save();
        return true;
    }
}
