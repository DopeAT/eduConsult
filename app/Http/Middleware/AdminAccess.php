<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAccess
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

        if($user = Auth::user()){

            if($user->role_id == 3) {
                return $next($request);
            }

        }

        session()->flash('error','Unauthorised 301.');
        return redirect()->back();
    }
}
