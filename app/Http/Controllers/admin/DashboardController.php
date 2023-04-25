<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Message;

class DashboardController extends Controller
{
    public function index(){
        $messages = new Message();
        return view('admin.pages.dashboard', ['messages' => $messages]);
//        if (!Auth::user()) return redirect('/admin/login');
//        else {
//            if (Auth::user() && Auth::user()->role >= 2) {
//                $profile = Auth::user();
//                return view('admin.pages.dashboard', ['profile' => $profile]);
//            }
//            elseif (Auth::user() && Auth::user()->role == 1) return redirect('/');
//        }
    }
}
