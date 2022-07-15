<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use Closure;
use Illuminate\Http\Request;

class CheckEmailVerification
{
    public function __construct(){

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $message = new Controller();
        if(auth()->user()){
            if(isset(auth()->user()->email_verified_at) == false){
                $message->dangerMessage('Please verify your email address to proceed!');
                return redirect('must-verify');
            }
        }
        return $next($request);
    }
}
