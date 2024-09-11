<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\loginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        /* User::create([
             'name' => 'randy',
             'email' => 'randy@gmail.com',
             'password' => Hash::make('randy1234')
         ]); */

        return view('auth.login');
    }

    public function dologin(loginRequest $request)
    {
        $credentiales = $request->validated();
        if (Auth::attempt($credentiales)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.property.index'));
        }

        return back()->withErrors([
            'email' => 'indentifiant incorrect',

        ])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
        return to_route('login');
    }
}

