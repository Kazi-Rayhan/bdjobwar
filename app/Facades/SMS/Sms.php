<?php

namespace App\Facades\SMS;

use Illuminate\Support\Facades\Http;

class Sms{

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
}