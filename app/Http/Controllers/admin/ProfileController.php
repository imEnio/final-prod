<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index($id = null){
        if (!Auth::user()) return redirect('/admin/login');
        else {
            if (Auth::user() && Auth::user()->role >= 2) {
                $profile = Auth::user();
                return view('admin.pages.profiles.profile', ['profile' => $profile]);
            }
            elseif (Auth::user() && Auth::user()->role == 1) return redirect('/');
        }

        $profile = Auth::user();

        return view('admin.pages.profiles.profile', ["profile" => $profile]);
    }

    public function uploadAvatar(Request $request)
    {
        $img = $request->file('file');
        $id = $request->get('id');
        $profile = User::find($id);

        $path = $profile->avatar;
        if ($img){
            $path = Storage::putFile('avatar', $img);
            if ($profile->avatar)
                Storage::delete($profile->avatar);
        }

        $profile->avatar = $path;
        $profile->save();

        return url('storage/' .$path);
    }

    public function save()
    {

    }
}
