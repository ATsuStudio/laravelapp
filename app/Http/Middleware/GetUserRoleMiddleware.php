<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GetUserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $role = auth()->user()->role;
        } catch (\Throwable $th) {
            $role = "unknow";
        }
        
        $request->merge(['user_role' => $role]);
        return $next($request);
    }
}
