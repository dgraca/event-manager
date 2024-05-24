<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureProfileName
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Exclude the user profile routes from the profile name check
        if ($request->is('admin/user/profile')) {
            return $next($request);
        }

        // Perform the profile name check for all routes
        if (!$request->user()->name) {
            flash(__('Please fill in your profile name.'))->overlay()->warning();
            return redirect()->route('profile.show');
        }

        return $next($request);
    }
}
