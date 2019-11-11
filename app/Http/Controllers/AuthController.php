<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\User;

class AuthController extends Controller
{
    public function register(UserRegisterRequest $request)
    {
        $user= User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->password),
        ]);

        return $user;
    }
}
