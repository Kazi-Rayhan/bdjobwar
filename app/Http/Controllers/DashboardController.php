<?php

namespace App\Http\Controllers;
Use App\Models\Order;
Use App\Models\UserExam;
use PDF;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.index');
    }
    public function orders()
    {
        $orders = Order::where('user_id',Auth()->user()->id)->latest()->get();
        return view('dashboard.order',compact('orders'));
    }
    public function invoice(Order $order)
    {
        $pdf = PDF::loadView('dashboard.invoice', ['order' => $order]);

        return $pdf->download('order.pdf');
 
    }
    public function exams()
    {
        $exams=UserExam::where('user_id',Auth()->user()->id)->get();
        return view('dashboard.exams',compact('exams'));
    }
    public function profile(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:40'],
            'email' => ['nullable', 'max:40', 'email'],
            // 'address' => ['required', 'max:200'],
            // 'phone' => ['required', 'max:20']
        ]);
        $user=Auth()->user();

        $user->name=$request->name;
        $user->email=$request->email;
        // $user->phone=$request->phone;
        // $user->address=$request->address;
        if($request->filled('password')){
            $user->password=Hash::make($request['password']);
        }

        $user->update();
        return redirect()->back();
    }
}
