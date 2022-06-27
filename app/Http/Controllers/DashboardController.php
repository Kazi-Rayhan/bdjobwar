<?php

namespace App\Http\Controllers;
Use App\Models\Order;
Use App\Models\UserExam;
use PDF;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
            'avatar'=>['nullable','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'name' => ['required', 'max:40'],
            'email' => ['nullable', 'max:40', 'email'],
        ]);
        $user=Auth()->user();

        if($request->has('avatar')){
            if(Storage::has( $user->avatar)){
                Storage::delete($user->avatar);
            }
           $image = $request->avatar->store('user');
           $user->avatar = $image;
           $user->update();
           
        }

        $user->name=$request->name;
        $user->email=$request->email;

        if($request->filled('password')){
            $user->password=Hash::make($request['password']);
        }

        $user->update();
        return redirect()->back();
    }
    public function testHistory()
    {
        $user=Auth()->user()->id;
        $testHistories=UserExam::where('user_id',$user)->latest()->get();
        return view('dashboard.test_history',compact('testHistories'));
    }
}
