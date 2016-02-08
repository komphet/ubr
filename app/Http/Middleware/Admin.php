<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Admin
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

        if(!Auth::check()) {
            return redirect()->guest('login/?redirect='.urlencode('//'.$_SERVER['SERVER_NAME'].$request->getRequestUri()));
        }else{
            if(!Auth::user()->admin){
                $error = 'คุณไม่มีสิทธิ์ใช้งานฟังก์ชั่นนี้!';
                return view('errors.error')->withError($error)->with('redirect',route('member'));
            }
        }
        return $next($request);
    }
}
