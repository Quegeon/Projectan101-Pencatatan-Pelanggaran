<?php

namespace App\Http\Middleware;

use App\Models\TempAturan;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class NewData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $auth = Auth::user();
        if($auth) {
            $cacheKey = $auth->id .'newData';
            $cached = cache($cacheKey);

            if(!$cached) return $next($request);
        
            TempAturan::where('no_pelanggaran', $cached)
                ->each(function($old) {
                    $old->delete();
                });

            cache()->forget($cacheKey);
            return $next($request);
        }

        return route('login.bk');
    }
}
