<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckInactivity
{
    public function handle($request, Closure $next)
    {
        $inactivity = 15 * 60; // 15 minutos em segundos
        
        if (Auth::check()) {
            $lastActivity = Session::get('lastActivityTime');
            
            if (time() - $lastActivity > $inactivity) {
                Session::put('locked', true);
                return redirect()->route('lock-screen');
            }
            
            Session::put('lastActivityTime', time());
        }
        
        return $next($request);
    }
}