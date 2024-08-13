<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class SuccessController extends Controller
{
    public function registration(){
        return view('frontEnd.success.registration');
    }

    public function order(Order $order){
        return view('frontEnd.success.order',compact('order'));
    }
}
