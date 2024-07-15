<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;

class AuthController extends Controller
{
    public function loginIndex()
    {
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }
        return view('user.auth.login');
    }

    public function login(Request $request)
    {
         $request->validate([
            'f_name' => 'required|string|exists:users,f_name|max:100',
            'password' => 'required|min:6|max:50',
        ]);

        if (Auth::guard('web')->attempt(['f_name' => $request->f_name, 'password' => $request->password])) {
            return redirect()->route('site');
        } else {
            $errors = new MessageBag();
            $errors->add('Error', __('The data is wrong'));
            return redirect()->route('user.login')->withInput()->withErrors($errors);
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::guard('web')->logout();
        return redirect()->route('site');
    }
}
