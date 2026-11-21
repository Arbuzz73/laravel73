<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // ВРЕМЕННАЯ СТРОКА ДЛЯ ОТЛАДКИ
        //dd(auth()->user(), auth()->user()->role?->name, $roles);

        if (!auth()->check() || !in_array(auth()->user()->role?->name, $roles)) {
            abort(403, 'Доступ запрещен');
        }

        return $next($request);
    }
}