<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LockScreenController extends Controller
{
    public function show()
    {
        if (!session('locked') || !Auth::check()) {
            return redirect('/dashboard');
        }
        
        return view('auth.lock');
    }

    public function unlock(Request $request)
    {
        $request->validate(['password' => 'required']);
        
        if (Auth::attempt([
            'email' => Auth::user()->email,
            'password' => $request->password
        ])) {
            session()->forget('locked');
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['password' => 'Senha incorreta']);
    }
}