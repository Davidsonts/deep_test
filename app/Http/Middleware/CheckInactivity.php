<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

class CheckInactivity
{
    public function handle($request, Closure $next)
    {
        // Ignorar nas rotas de bloqueio
        if ($request->routeIs('lock-screen') || $request->routeIs('unlock')) {
            return $next($request);
        }

        $inactivity = env('SESSION_LIFETIME', 15) * 60; // minutos para segundos

        if (Auth::check()) {
            $lastActivity = Session::get('lastActivityTime');
            
            // Se não há registro de atividade ,crie um
            if (!$lastActivity) {
                Session::put('lastActivityTime', time());
                return $next($request);
            }
            
            // Se excedeu o tempo de inatividade E não está bloqueado
            if ((time() - $lastActivity > $inactivity) && !Session::get('locked')) {
                Session::put('locked', true);
                return redirect()->route('lock-screen');
            }
            
            // Atualiza o tempo de atividade
            Session::put('lastActivityTime', time());
        }
        
        return $next($request);
    }
}