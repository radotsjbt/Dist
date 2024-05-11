<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Harvest;

class FarmerProductCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, Harvest $harvest): Response
    {
        if(!auth()->check() || auth()->user()->username!== $harvest){
            abort('403');
        }
             return $next($request);
    }
}
