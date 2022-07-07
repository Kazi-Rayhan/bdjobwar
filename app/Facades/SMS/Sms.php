<?php

namespace App\Facades\SMS;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Http;

class Sms{

    //example :  SMS::compose('01795560431','T =est Message')->send();

    protected string $endpoint;
    protected string $userName;
    protected string $password;
    protected $to;
    protected $body;


    public function __construct($to = null,$body = null)
    {
        $this->to = $to;    
        $this->body = $body;
        $this->userName = \config('sms.username');
        $this->password = \config('sms.password');
        $this->endpoint = \config('sms.endpoint');
    }
    
    /**
     * compose
     *
     * @param  mixed $to
     * @param  mixed $body
     * @return void
     */
    public static function compose($to,$body){
    
        return new static($to,$body);
    }

    public function send(){
        $client = Http::asForm()->post($this->endpoint,[
			"username" => $this->userName,
	        "password" => $this->password,
	        "number" => $this->to,
	        "message" => $this->body,
		]);
        return $client->json();
    }

    public static function otp(User $user){
        
        //if user has otp then he will not create a new otp he will send what he have
        //if otp sent at past 2 miniute new otp will be created and previous one count as expired
       if($user->otp_sent_at && $user->otp && $user->otp_sent_at > now()->addMinutes(-2)){
            $otp = $user->otp;
       }else{
            $otp = rand(9999,99999);
            $user->update([
                'otp'=>$otp,
                'otp_sent_at'=>now()
            ]); 
       }
       
        $to = $user->phone;
        $body = 'OTP from '.env('APP_NAME').': '.$otp.' this code will be valid for';

        return new static($to,$body);
    }
}