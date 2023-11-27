<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class level
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$levels): Response
    {
        $user = Auth::user();
        if(!$user) {
            return redirect(url()->previous());
        }
        
        foreach ($levels as $level) {
            if($level == $user->level) {
                return $next($request);
            }
        }

        return redirect(url()->previous());
    }
}
