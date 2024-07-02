<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class SuccessController extends Controller
{
    public function registration(){
        return view('frontend.success.registration');
    }

    public function order(Order $order){
        return view('frontend.success.order',compact('order'));
    }
}
