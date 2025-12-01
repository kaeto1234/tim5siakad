<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     * Usage: ->middleware('role:admin') or ->middleware('role:admin,dosen')
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        if (! $request->user()) {
            return redirect()->route('login');
        }

        $allowed = explode(',', $roles);
        if (! in_array($request->user()->role, $allowed)) {
            abort(403, 'Akses ditolak.');
        }

        return $next($request);
    }
}
