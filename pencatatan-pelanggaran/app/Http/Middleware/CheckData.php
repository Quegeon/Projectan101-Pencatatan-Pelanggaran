<?php

namespace App\Http\Middleware;

use App\Models\TempAturan;
use App\Models\DetailAturan;
use Illuminate\Support\Str;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $auth = Auth::User();
        if($auth) {
            $cacheKey = $auth->id.'dataEdit';
            $cached = cache($cacheKey);
            if(!$cached) return $next($request);

            foreach ($cached as $detailCache) {
                $details = new DetailAturan();
                $details->id = Str::orderedUuid();
                $details->fill($detailCache->toArray());
                $details->save();
            }
    
            TempAturan::where('no_pelanggaran', $cached[0]->no_pelanggaran)
                ->each(function($old) {
                    $old->delete();
                });

            cache()->forget($cacheKey);
            return $next($request);
        }

        return route('login.bk');
    }
}
