<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::firstWhere('username', $credentials['username']);

        if ($user['is_admin']) {
            if (auth::attempt((['username' => $credentials['username'], 'password' => $credentials['password']]))) {
                $request->session()->regenerate();

                return redirect('/dashboard');
            }
        }

        return back()->with('loginError', 'Login failed.');
    }
}
