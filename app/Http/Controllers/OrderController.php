<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Order;
use App\Models\Package;
use App\Services\OrderServices;
use Illuminate\Http\Request;
use Error;
use Exception;
use Illuminate\Support\Facades\DB;
use SMS;
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
    public function create($type,$id)
    {
        $data = [];
        switch ($type) {
            case 'package':
                $data = Package::find($id);
                break;
            case 'exam':
                $data = Exam::find($id);
                break;
        }
      return view('frontEnd.order',compact('data','type','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $request->validate([
            "trnxId"=>'required'
        ]);
        try{
            DB::beginTransaction();
            OrderServices::make($request->type,$request->id,$request->trnxId)->save();
            SMS::compose(Auth()->user()->phone,'Thanks, your transaction id is pending');
            DB::commit();
            
        return redirect()
            ->back()
            ->with('success', 'Order created successfully');
        }catch(Exception $e){
            // return $e->getMessage();
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage());
        }catch(Error $e){
            // return $e->getMessage();
            DB::rollBack();
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
