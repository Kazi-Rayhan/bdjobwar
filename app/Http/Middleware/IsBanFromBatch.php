<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsBanFromBatch
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (auth()->check() && @auth()->user()->bought($request->batch->id) && !auth()->user()->information->is_paid && @!$request->batch->studentStatus(auth()->user())) {
            return abort(403, 'আপনি ব্যচটি থেকে বহিষ্কার হয়েছেন । অনুগ্রহ করে এডমিনের সাথে যোগাযোগ করুন ।');
        } else {
            return $next($request);
        }
    }
}
