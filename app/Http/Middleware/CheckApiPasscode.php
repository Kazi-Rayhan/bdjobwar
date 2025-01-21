<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckApiPasscode
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
        $passcode = $request->header('X-API-PASSCODE');

        if ($passcode !== config('app.api_passcode')) {
            return response()->json(['error' => 'Unauthorized access'], 401);
        }

        return $next($request);
    }
}
