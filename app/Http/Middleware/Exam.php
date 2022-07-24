<?php

namespace App\Http\Middleware;

use App\Models\Exam as ModelsExam;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Exam
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
        $exam = ModelsExam::where('uuid',$request->uuid)->first();
        if(Auth::user()->exams()->find($exam->id)->pivot->answers ){
            return \redirect()->route('result-exam',$exam->uuid);
        }
        if(!Auth::user()->exams()->find($exam->id)->pivot->expire_at){
            return \redirect()->route('start-exam',$exam->uuid);
        }

        
       
        
      
        
        
        return $next($request);
    }
}
