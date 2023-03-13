<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            if (Auth::user() && Auth::user()->role >= 2) {
                return "/admin/dashboard";
            } elseif (Auth::user() && Auth::user()->role == 1) {
                return '/';
            }
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
}
