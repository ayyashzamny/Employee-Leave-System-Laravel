<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('User_name', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->Active_Status === 'inactive') {
                Auth::logout();
                return redirect()->route('login')->with('error', 'Your account is inactive.');
            }

            if ($user->Privilage_status === 'admin') {
                return redirect()->route('dashboard');
            }

            // For employee, redirect to employee dashboard with their name
            return redirect()->route('employee.home')->with('name', $user->User_name);
        }

        return redirect()->route('login')->with('error', 'Invalid credentials.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
