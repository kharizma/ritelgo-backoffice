<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class IsCompleteRegistration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->is_complete_registration == User::UNCOMPLETE_REGISTRATION){
            return $next($request);
        }else{
            if($request->route()->getName() == 'business-info.index'){
                return redirect()->route('home');
            }
        }
    }
}
