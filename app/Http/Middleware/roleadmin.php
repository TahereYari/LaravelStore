<?php

namespace App\Http\Middleware;

use App\Models\permission;
use App\Models\role;
use Closure;
use DragonCode\Contracts\Cashier\Auth\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class roleadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $role=role::where('name','=','admin')->first()->id;
     
        // $role_id=$request->user()->role_id;
        // $permission=permission::where('role_id','=',$role_id)->first();
        // if ($request->user()->role_id==$role) {
        //     return $next($request);
        // }
        $role=role::where('name','=','user')->first()->id;
        if ($request->user()->role_id!=$role) {
            return $next($request);
        }
        // if ($request->user()->role_id!=$role && $permission->read==1) {
        //     return $next($request);
        // }

        // if ($request->user()->role_id!=$role && $permission->edit==1) {
        //     return $next($request);
        // }
        // if ($request->user()->role_id!=$role && $permission->delete==1) {
        //     return $next($request);
        // }
        // abort(404,'شما دسترسی لازم برای ورود به این صفحه رو ندارید');
       return redirect()->route('login');
    }
}
