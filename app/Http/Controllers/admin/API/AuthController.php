<?php

namespace App\Http\Controllers\admin\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseAPIController
{
    public function registration(Request $request): \Illuminate\Http\JsonResponse
    {
        return $this->apiResponse(function () use ($request) {
            $validated = Validator::make($request->all(), [
                'login' => 'required|unique:users',
                'password' => 'required|confirmed',
            ]);
            if ($validated->fails()) {
                throw new \Exception($validated->errors()->first(), 402);
            }
            $user = new User();
            $user->login = $request->get('login');
            $user->password = Hash::make($request->get('password'));
            $user->role = User::ROLE_USER;
            $user->save();
            auth()->login($user);
            return true;
        });

    }
}
