<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $authUserRole = Auth::user()->role;

        switch($role){
            case 'admin':
                if($authUserRole == 0){
                    return $next($request);
                }
                break;
            case 'user':
                if($authUserRole == 1){
                    return $next($request);
                }
                break;
        }

        switch($authUserRole){
            case 0:
                return redirect()->route('admin');
                break;
            case 1:
                return redirect()->route('user');
                break;
        }


        return redirect()->route('login');
    }
}
