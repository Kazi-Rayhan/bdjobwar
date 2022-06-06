<?php

namespace App\Http\Controllers;
Use App\Models\Order;
use PDF;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.index');
    }
    public function orders()
    {
        $orders = Order::where('user_id',Auth()->user()->id)->where('status','1')->latest()->get();
        return view('dashboard.order',compact('orders'));
    }
    public function invoice(Order $order)
    {
        $pdf = PDF::loadView('dashboard.invoice', ['order' => $order]);

        return $pdf->download('order.pdf');
 
    }
}
