<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('userLogout');
    }
    public function showLogin()
    {
        return view('User.login');
    }

    public function showSignup()
    {
        return view('User.signup');
    }

    public function signup(Request $request)
    {
        $validationData = $request->validate([
            'name' => 'required',
            'email' => ['required','unique:users'],
            'password' => ['required','min:5','max:20']
        ]);

        try {
            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ]);
            session()->flash('message','Account Successfully Created');
            return redirect()->route('user.login');
        } catch(\Exception $err) {
            return redirect()->back()->withErrors($err);
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        $credentials = $request->only(['email','password']);

        if (auth()->attempt($credentials)){
            return redirect()->intended(route('user.sell'));
        }
        return redirect()->route('user.login');
    }

    public function userLogout()
    {
        Auth::logout();
        return redirect()->route('user.login');
    }
}
