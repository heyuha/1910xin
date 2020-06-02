<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
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
        // 取出session的值  判断是否登录
        $adminInfo = session('adminInfo');
        // dd($adminInfo);
        if(!$adminInfo){
            return redirect("/login");
        }
        return $next($request);
    }
}
