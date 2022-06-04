<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Facades\SMS\Sms;
use Error;
use Exception;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    public function otp()
    {
        return view('auth.otp');
    }
    public function otpSend()
    {

        $user = auth()->user();
      
        SMS::otp($user)->send();
        return back();
       
    
    }
    public function checkOtp(Request $request)
    {   

        $request->validate([
            "otp"=>'required'
        ]);
        try{
            Auth::user()->verify($request->otp);
            return redirect(route('dashboard'));
        }catch(Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }catch(Error $e){
            return redirect()->back()->withErrors($e->getMessage());

        }
       
    }
}
