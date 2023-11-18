<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     if (Auth::check() && Auth::user()->user_status)
    //     {
    //         $banned = Auth::user()->user_status == "off";
    //         Auth::logout();

    //         if($banned == 'off'){
    //             $message = 'Your Accout Has Been Deactivated.Please Contact The Administrator.';
    //         }
    //         return redirect()->route('login')
    //         ->with('status' , $message)
    //         ->withErrors(['email' => 'Your Accout Has Been Deactivated.Please Contact The Administrator.']);
    //     }
    //     return $next($request);
    // }

    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user && $user->user_status === 'off') {
            Auth::logout();
            $message = 'Your Account Has Been Deactivated. Please Contact The Administrator.';

            return redirect()->route('login')
                ->with('status', $message)
                ->withErrors(['email' => $message]);
        }

        return $next($request);
    }
}
