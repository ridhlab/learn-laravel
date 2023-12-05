<?php

namespace App\Applications\Auth;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthApplication
{
    public function authenticate($email, $password): bool
    {
        return Auth::attempt(['email' => $email, 'password' => $password]);
    }

    public function addUser(RegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->validated('name');
        $user->email = $request->validated('email');
        $user->password = Hash::make($request->validated('password'));
        $user->save();
    }
}
