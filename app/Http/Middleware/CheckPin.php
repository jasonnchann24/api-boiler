<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CheckPin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $user = Auth::user();
        if (!Hash::check($request->input('pin'), $user->userPin->pin)) {
            return response()->json([
                'error' => 'Not authorized PIN.'
            ], 401);
        }

        return $next($request);
    }
}
