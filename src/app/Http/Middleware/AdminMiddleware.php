<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->Privilage_status !== 'admin') {
            abort(403, 'Unauthorized action.'); // Redirect or abort if not admin
        }

        return $next($request);
    }
}
