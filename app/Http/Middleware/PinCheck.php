<?php

namespace App\Http\Middleware;

use App\Models\Exam;
use Closure;
use Illuminate\Http\Request;

class PinCheck
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
        session()->put('from', $request->getRequestUri());
        
        $exam = Exam::where('uuid',$request->uuid)->first();
        if($exam->pin){
            if(@session()->get('exam')["$request->uuid"]){
                return $next($request);
            }else{
                return redirect()->route('givepin',$request->uuid);
            }
        }
        return $next($request);
    }
}
