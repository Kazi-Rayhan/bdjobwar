<?php

namespace App\Http\Middleware;

use App\Models\Exam;
use Closure;
use Illuminate\Http\Request;

class CanAttendThisExam
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
        $exam = Exam::where('uuid',$request->uuid)->first();
        if(auth()->user()->ownThisExam($exam)){
            return $next($request);
        }
        return redirect()->route('orderCreate',['exam',$exam->id]);
        
    }
}
