<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index(){
        $users = User::all();
        if (!Auth::user()) return redirect('/admin/login');
        else {
            if (Auth::user() && Auth::user()->role >= 2) {
                $profile = Auth::user();
                return view('admin.pages.users.show', ['profile' => $profile, 'users' => $users]);
            }
            elseif (Auth::user() && Auth::user()->role == 1) return redirect('/');
        }
    }
}
