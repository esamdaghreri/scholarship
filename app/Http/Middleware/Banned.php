<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use app\User;

class Banned
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
        if(User::isBanned()){
            return redirect()->route('user.home')->with('danger', trans('public.you_account_banned_please_contact_us_for_unbanned'));
        }
        return $next($request);
    }
}
