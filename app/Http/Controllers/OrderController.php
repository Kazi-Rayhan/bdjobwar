<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Order;
use App\Models\Package;
use App\Services\OrderServices;
use Illuminate\Http\Request;
use Error;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Facades\SMS\Sms;
use App\Models\Batch;

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
    public function create($type, $id)
    {
        $data = [];
        switch ($type) {
            case 'package':
                $data = Package::find($id);
                break;
            case 'batch':
                $data = Batch::find($id);
                break;
        }

        define('DECLINED', 0);
        $orders = $data->orders->where('user_id', auth()->id())->where('status', '!=', DECLINED)->first();

        if ($orders) {
            return redirect()
                ->route('success.order', $orders)
                ->with('success', 'Already has a order ');
        }
        return view('frontEnd.order', compact('data', 'type', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //    dd($request->all());
        $request->validate([
            "account" => 'required',
            "trnxId" => 'nullable',
            "method" => 'required'
        ]);
        try {
            DB::beginTransaction();
            $data = [$request->type, $request->id, $request->account, $request->trnxId, $request->method];
            // dd($data);
            $order = OrderServices::make(...$data)->save();
            //    dd($order);
            SMS::compose(Auth()->user()->phone, 'Thanks, your transaction id is pending');
            DB::commit();

            return redirect()
                ->route('success.order', $order)
                ->with('success', 'Order created successfully');
        } catch (Exception $e) {
            // return $e->getMessage();
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage());
        } catch (Error $e) {
            // return $e->getMessage();
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
    public function accept(Order $order)
    {
        try {

            OrderServices::accept($order);
            return redirect()->back()->with([
                'message'    => 'Order is accepted',
                'alert-type' => 'success',
            ]);
        } catch (Exception $e) {
            return redirect()->back()->with([
                'message'    => $e->getMessage(),
                'alert-type' => 'success',
            ]);
        } catch (Error $e) {
            return $e->getMessage();
        }
    }
    public function declined(Order $order)
    {
        try {
            OrderServices::decline($order);
            return back();
        } catch (Exception $e) {
            return $e->getMessage();
        } catch (Error $e) {
            return $e->getMessage();
        }
    }
}
