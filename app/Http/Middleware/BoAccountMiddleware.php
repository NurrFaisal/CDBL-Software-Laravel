<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class BoAccountMiddleware
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

        if(Session::get('bo_id') != null){
            return $next($request);
        }else{
            return redirect('/open-bo-account')->with('message', 'Please Login your BO account first !!! ');
        }



//        return $next($request);
    }
}
