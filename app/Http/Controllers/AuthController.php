<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->email == 'admin@gmail.com') {
                return redirect()->route('dashboard');
            }

            session()->flash('success', 'تم تسجيل الدخول بنجاح');
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة. يرجى المحاولة مرة أخرى.',
        ])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->route('register')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if (User::count() == 1) {
            $user->role = 'admin';
            $user->password = Hash::make('admin123');
            $user->save();
        }

        Auth::login($user);

        session()->flash('success', 'تم إنشاء الحساب بنجاح');
        return redirect()->route('dashboard');
    }
}

