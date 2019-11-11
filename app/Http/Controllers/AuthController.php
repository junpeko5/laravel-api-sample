<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required|unique:users,email',
            'name' => 'required',
            'password' => 'required|min:6'
        ]);

        $user= User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->password),
        ]);

        return $user;
    }
}
