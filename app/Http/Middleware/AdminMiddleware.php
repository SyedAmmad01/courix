<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (Auth::guard('admin')->check()) {
        //     $banned = Auth::guard('admin')->user()->user_status == "1";
        //     if ($banned) {
        //         $message = 'Your Account Has Been Deactivated. Please Contact The Administrator.';
        //     }
        //     Auth::guard('admin')->logout();
        //     return redirect()->route('admin.login')
        //         ->with('status')
        //         ->withErrors(['email' => 'Your Account Has Been Deactivated. Please Contact The Administrator.']);
        // }
        return $next($request);
    }
}
