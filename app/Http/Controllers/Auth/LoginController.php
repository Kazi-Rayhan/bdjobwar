<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function username()
    {

        return 'phone';
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }
    
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => ['আপনার কোন অ্যাকাউন্ট করা নেই। ফ্রি অ্যাকাউন্ট করতে ,নিচের ফ্রি অ্যাকাউন্ট খুলুন লিঙ্কে ক্লিক করুন'],
        ]);
    }

    protected function attemptLogin(Request $request)
    {
        $rollOrPhone = $request->phone;

        $user = User::where('phone', $rollOrPhone)
            ->orWhereHas(
                'information',
                function ($q) use ($rollOrPhone) {
                    return $q->where('id', $rollOrPhone);
                }
            )
            ->first();

        return $this->guard()->attempt(
            ['phone' => @$user->phone, 'password' => $request->password],
            $request->boolean('remember')
        );
    }


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
