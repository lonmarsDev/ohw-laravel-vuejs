<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
class CheckUserPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        $route = $request->route()->getName();
        $routes = $request->route();

        $permission = $user->role->permissions()->where('key',$route)->first();
        if(is_null($permission)){
            if($routes->methods[0]=='GET'){
                if($user->role->name !='owner' && $user->role->name !='assistant'){
                    return redirect('/admin/404.html');
                }else{
                     return redirect('/404.html');
                }
            }else{
                return response()->json(['message'=>'Unauthorize request','route'=> $routes ]);
            }
            
        }
        return $next($request);
    }
}
