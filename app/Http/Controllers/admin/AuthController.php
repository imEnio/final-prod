<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\RecoveryMsg;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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
        throw new Exception('Неверный логин или пароль', 403) ;
    }

    /**
     * @return RedirectResponse
     */
    protected function authenticated(): RedirectResponse
    {
        return redirect()->intended();
    }

    public function registration(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'login' => 'required|unique:users',
            'password' => 'required|confirmed',
        ]);
        if ($validated->fails()){
            throw new Exception($validated->errors()->first(), 402) ;
        }
        $user = new User();
        $user->login = $request->get('login');
        $user->password = Hash::make($request->get('password'));
        $user->role = User::ROLE_USER;
        $user->save();
        auth()->login($user);
        return 'ok';
    }

    public function recovery(Request $request){
        $email = $request->get('email');
        $user = User::where(['email' => $email])->first();
        if ($user)
            Mail::to($email)->send(new RecoveryMsg());
        else
            throw new Exception('Email не найден.', 404) ;

    }
}
