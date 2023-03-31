<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response) $next
     * @return string
     */
    public function handle(Request $request, Closure $next): string
    {
        if (Auth::user() && Auth::user()->role == User::ROLE_USER) return redirect('/');
        dd($request);
        return $next($request);
    }
}
