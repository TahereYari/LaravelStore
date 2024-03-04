<?php

namespace App\Http\Middleware;

use App\Models\permission;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class update
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role_id=$request->user()->role_id;
        // $role_id1=role::where('user_id','=',$role_id)->first()->id;
        $permission=permission::where('role_id','=',$role_id)->first();
       if ($permission->edit==1) {
        return $next($request);
       }

    //   return response('شما دسترسی لازم برای ورود به این صفحه رو ندارید',401);
    abort(401,'شما دسترسی لازم برای ورود به این صفحه رو ندارید');
        
    }
}
