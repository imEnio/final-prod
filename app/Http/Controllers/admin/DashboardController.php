<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        if (!Auth::user()) return redirect('/admin/login');
        else {
            if (Auth::user() && Auth::user()->role >= 2) {
                $user = Auth::user();
                return view('admin.pages.dashboard', ['user' => $user]);
            }
            elseif (Auth::user() && Auth::user()->role == 1) return redirect('/');
        }
    }
}
