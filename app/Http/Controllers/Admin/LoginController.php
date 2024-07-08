<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(LoginRequest $request)
    {
        // Attempt to log the admin in using the custom 'admin' guard
        if (auth()->guard('admin')->attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->withErrors(['login_error' => 'Invalid username or password']);

    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('adminlogin.show');
    }
}
