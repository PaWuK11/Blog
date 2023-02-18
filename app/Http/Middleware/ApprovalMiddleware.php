<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApprovalMiddleware
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
        if(auth()->check()){
            if (auth()->user()->email_verified_at == null){
                return $next($request);
            }
            else if(auth()->user()->declined){
                auth()->logout();
                return redirect()->route('login')->with('message', 'Your account was declined by administrator.');
            }
            else if(!auth()->user()->is_author){
                auth()->logout();
                return redirect()->route('login')->with('message', 'Your account needs Admin approval!');
            }
        }
        return $next($request);
    }
}
