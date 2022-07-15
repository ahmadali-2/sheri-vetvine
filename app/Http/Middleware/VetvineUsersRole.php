<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;



class VetvineUsersRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {


        // $user = Auth::check() ? Auth::user() : null;
        // if($user->type != 2) {
        //     notify()->error("Your account is not approved by admin. Please try again later");
        //     // Auth::logout();
        //     return redirect('/');
        // }

        return $next($request);
    }
}
