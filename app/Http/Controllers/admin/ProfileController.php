<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index($id = null){
        if (!Auth::user()) return redirect('/admin/login');
        else {
            if (Auth::user() && Auth::user()->role >= 2) {
                $user = Auth::user();
                return view('admin.pages.profile', ['user' => $user]);
            }
            elseif (Auth::user() && Auth::user()->role == 1) return redirect('/');
        }

        $user = Auth::user();

        return view('admin.pages.profile', ["user" => $user]);
    }
}
