<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Facades\SMS\Sms;
use Error;

class AuthenticateController extends Controller
{
    public function otpCode(string $phone, $user)
    {
        session()->forget('otp');
        $otp = rand(10000, 99999);
        
        Session::put('otp', $otp);
        session()->put('user_id',$user->id);
        SMS::compose($user->phone,$otp)->send();
    }
    public function otp()
    {
        return view('auth.otp');
    }
    public function otpSend()
    {

        $user = Auth()->user();
      
        $this->otpCode($user->phone, $user);
        return back();
       
    
    }
    public function checkOtp(Request $request)
    {
        if ($request->otp == session()->get('otp')) {
            session()->forget('otp');
            return redirect(route('dashboard'));
        }
        return redirect(route('otp'));
    }
}
