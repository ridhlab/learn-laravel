<?php

namespace App\Http\Controllers;

use App\Applications\Auth\AuthApplication;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    private AuthApplication $authApplication;

    public function __construct(AuthApplication $authApplication)
    {
        $this->authApplication = $authApplication;
    }

    public function loginPage()
    {
        return view('pages.auth.login');
    }

    public function registerPage()
    {
        return view('pages.auth.register');
    }

    public function register(RegisterRequest $request)
    {
        try {
            $this->authApplication->addUser($request);
            $isAuthenticated = $this->authApplication->authenticate($request->validated('email'), $request->validated('password'));
            if ($isAuthenticated) {
                $request->session()->regenerate();
                return redirect()->intended('/questions')->with('success', 'Success login');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function login(LoginRequest $request)
    {
        try {
            $isAuthenticated = $this->authApplication->authenticate($request->validated('email'), $request->validated('password'));
            if ($isAuthenticated) {
                $request->session()->regenerate();
                return redirect()->intended('/questions')->with('success', 'Success login');
            } else {
                Session::flash('error', 'Email or password is not valid');
                return redirect('/login');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function logout()
    {
        try {
            Auth::logout();
            return redirect('/login');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
