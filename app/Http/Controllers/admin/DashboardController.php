<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    public function index()
    {
        $messages = new Message();
        return view('admin.pages.dashboard', ['messages' => $messages]);
    }
}
