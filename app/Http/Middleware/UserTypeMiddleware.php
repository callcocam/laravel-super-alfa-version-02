<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserTypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()){
            $prefix = $request->route()->getAction('prefix');
            $type = $request->user()->type;
            if($prefix !== $type){
                abort(401, 'Acesso negado');
            }
        }
        return $next($request);
    }
}
