<?php

namespace App\Http\Middleware;

use App\Models\role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class roleadminjason
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role=role::where('name','=','user')->first()->id;
        if ($request->user()->role_id!=$role) {
            return $next($request);
        }
        return response("you can not be here",401);
       
    }
}
