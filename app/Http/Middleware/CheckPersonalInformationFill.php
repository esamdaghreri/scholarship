<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use app\User;
class CheckPersonalInformationFill
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
        if(User::areFieldEmpty()){
            return redirect()->route('personnel.showPersonnelData', Auth::user()->id);
        }
        return $next($request);
    }
}
