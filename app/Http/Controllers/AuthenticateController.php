<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\UserMeta;
use Illuminate\Support\Facades\Hash;
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
    public function testLogin(Request $request)
{
     $phone = $request->input('phone');
     $password = $request->input('password');
     $roll=$request->input('phone');

     $user = User::where('phone', '=', $phone)->first();
     $user_roll = UserMeta::where('id', '=', $roll)->first();
     if($user){
        if (!$user) {
            return redirect()
            ->back()
            ->with('error', 'Bdjobwar.com ওয়েবসাইটতে আপনার কোন অ্যাকাউন্ট করা নেই। ফ্রি অ্যাকাউন্ট করতে ,নিচের ফ্রি অ্যাকাউন্ট খুলুন লিঙ্কে ক্লিক করুন');
         }
         if (!Hash::check($password, $user->password)) {
            return redirect()
            ->back()
            ->with('error', 'Bdjobwar.com ওয়েবসাইটতে আপনার কোন অ্যাকাউন্ট করা নেই। ফ্রি অ্যাকাউন্ট করতে ,নিচের ফ্রি অ্যাকাউন্ট খুলুন লিঙ্কে ক্লিক করুন');
         }
         Auth::loginUsingId($user->id);
          return redirect()->route('dashboard')->with('success', 'Log In successfully');
     }

    else{
        if(!$user_roll){
            return redirect()
            ->back()
            ->with('error', 'Bdjobwar.com ওয়েবসাইটতে আপনার কোন অ্যাকাউন্ট করা নেই। ফ্রি অ্যাকাউন্ট করতে ,নিচের ফ্রি অ্যাকাউন্ট খুলুন লিঙ্কে ক্লিক করুন');
        }
        if (!Hash::check($password,$user_roll->user->password)) {
        return redirect()
        ->back()
        ->with('error', 'Bdjobwar.com ওয়েবসাইটতে আপনার কোন অ্যাকাউন্ট করা নেই। ফ্রি অ্যাকাউন্ট করতে ,নিচের ফ্রি অ্যাকাউন্ট খুলুন লিঙ্কে ক্লিক করুন');
        }
        Auth::loginUsingId($user_roll->user_id);
        return redirect()->route('dashboard')->with('success', 'Log In successfully');
         
     }


    }
}
