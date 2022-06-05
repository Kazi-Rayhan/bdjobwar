<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Package;
use Illuminate\Http\Request;
use Error;
use Exception;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Package $package)
    {
      return view('frontEnd.order',compact('package'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,Package $package)
    {
      
        $request->validate([
            "trnxId"=>'required'
        ]);
        try{
            $order=new Order;
            $order->user_id=Auth()->user()->id;
            $order->method=0;
            $order->trnxId=$request->trnxId;
            $order->status='0';
            $package->orders()->save($order);
            SMS::compose(Auth()->user()->phone,'Thanks, your transaction id is pending');
            return redirect()->back();
        }catch(Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }catch(Error $e){
            return redirect()->back()->withErrors($e->getMessage());

        }

      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
