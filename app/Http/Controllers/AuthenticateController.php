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
            "otp" => 'required'
        ]);
        try {
            Auth::user()->verify($request->otp);
            return redirect(route('dashboard'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        } catch (Error $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
    public function login(Request $request)
    {
        $request->validate(['phone' => 'required', 'password' => 'required']);
        $rollOrPhone = $request->phone;
        $password = $request->password;
        try {

            $user = User::where('phone', $rollOrPhone)
                ->orWhereHas(
                    'information',
                    function ($q) use ($rollOrPhone) {
                        return $q->where('id', $rollOrPhone);
                    }
                )
                ->firstOrFail();

            if (!Hash::check($password, $user->password)) throw new Exception;

            Auth::loginUsingId($user->id);
            return redirect()->intended();
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->with('error-msg', 'Bdjobwar.com ওয়েবসাইটতে আপনার কোন অ্যাকাউন্ট করা নেই। ফ্রি অ্যাকাউন্ট করতে ,নিচের ফ্রি অ্যাকাউন্ট খুলুন লিঙ্কে ক্লিক করুন');
        } catch (Error $e) {
            return redirect()
                ->back()
                ->with('error-msg', 'Bdjobwar.com ওয়েবসাইটতে আপনার কোন অ্যাকাউন্ট করা নেই। ফ্রি অ্যাকাউন্ট করতে ,নিচের ফ্রি অ্যাকাউন্ট খুলুন লিঙ্কে ক্লিক করুন');
        }
    }
    public function resetPassword(Request $request)
    {

        $phone = $request->input('phone');
        // dd($phone);

        try {
            $user = User::where('phone', $phone)->firstOrFail();
            // return $user;

            Session::put('user', $user);
            Sms::otp($user)->send();
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        } catch (Error $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }




        return redirect()
            ->route('resetPasswordVerify')
            ->with('success', 'Successfully OTP Send');
    }
    public function resetPasswordVerify()
    {
        return view('auth.passwords.otp');
    }
    public function resetOtpCheck(Request $request)
    {
        $request->validate([
            "otp" => 'required',
            "password" => 'required|confirmed'
        ]);
        try {
            $user = Session::get('user');
            $user->verify($request->otp);
            $user->password = Hash::make($request['password']);
            $user->update();
            Auth::login($user);

            // Session::forget('user');
            return redirect()
                ->route('home_page')
                ->with('success', 'Successfully password changed');
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        } catch (Error $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }
    public function setPassword()
    {
        return view('auth.passwords.confirm');
    }
    public function confirmPassword(Request $request)
    {
        try {
            $request->validate([
                "password" => 'required|confirmed'

            ]);
            $user = Session::get('user');
            $user->password = Hash::make($request['password']);
            $user->update();


            // Session::forget('user');
            return redirect()
                ->route('login')
                ->with('success', 'Successfully password changed');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        } catch (Error $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
