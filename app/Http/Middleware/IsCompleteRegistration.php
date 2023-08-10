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
        if(Auth::user()->is_complete_registration == User::COMPLETE_REGISTRATION){
            if($request->route()->getName() == 'business-info.index' OR $request->route()->getName() == 'business-info.store' OR $request->route()->getName() == 'business-info.update'){
                return redirect()->route('home');
            }

            return $next($request);
        }else{
            return redirect()->route('business-info.index');
        }
    }
}
