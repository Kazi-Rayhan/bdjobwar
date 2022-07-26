<?php

namespace App\Services;

use App\Models\Exam;
use App\Models\Order;
use App\Models\Package;
use App\Models\User;
use Error;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Facades\SMS\Sms;
use App\Models\Batch;

class OrderServices
{


    protected const MODEL = [
        'batch' => 'App\Models\Batch',
        'package' => 'App\Models\Package',
    ];

    protected string $account;
    protected  $trnxId;
    protected string $method;
    protected $model;


    public function __construct(string $type = null, int $id = null, string $account, string $trnxId = null,string $method)
    {
        $this->account = $account;
        $this->trnxId = $trnxId;
        $this->method = $method;
        $this->model = $this::MODEL[$type]::find($id);
    }

    public static function make(string $type, int $id, string $account,  $trnxId,string $method)
    {

        return new static($type, $id, $account, $trnxId,$method);
    }

    public function save(): Order
    {

        $order = $this->model->orders()->create([
            'user_id' => Auth::id(),
            // 'method' => Order::METHOD[['NAGAD'],
            'status' => Order::STATUS['PENDING'],
            'account' => $this->account,
            'trnxId' => $this->trnxId,
            'price' => $this->model->price,
            'method' => $this->method,
        ]);

        return $order;
    }

    public static function accept(Order $order ,$authorize = false)
    {
        if($authorize){
            if (!Auth::user()->can('read', $order)) throw new Exception('You do not have permission');
        }
        try {
            DB::beginTransaction();
            $user = User::find($order->user_id);
            $order->update([
                'status' => $order::STATUS['ACCEPTED']
            ]);
            if ($order->orderable instanceof Package) {
                $user->ownThisPackage($order->orderable);
                $message = "Bd job war এ আপনার ".$order->orderable->information()['title']." প্যাকেজটি সফলভাবে চালু হয়েছে। প্যাকেজের মেয়াদ :".$order->user->information->expired_at->format('d M,Y')." পর্যন্ত। ভিজিট ওয়েবসাইট: https://www.bdjobwar.com";
            }
            if ($order->orderable instanceof Batch) {
                $user->batches()->attach($order->orderable);
                $message = $order->orderable->information()['title']." ব্যাচে আপনার ভর্তি সফলভাবে সম্পন্ন হয়েছে। পরীক্ষা দিতে আপনার ব্যাচ লিংক: ".route('batch.details',$order->orderable)." অথবা ওয়েবসাইট ভিজিট করুন: https://www.bdjobwar.com";
            }
            DB::commit();
            SMS::compose($order->user->phone,$message)->send();
            return $order;
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        } catch (Error $error) {
            DB::rollBack();
            throw $error;
        }
    }

    public static function decline(Order $order)
    {
        if (!Auth::user()->can('read', $order)) throw new Exception('You do not have permission');
        try {
            DB::beginTransaction();
            $order->update([
                'status' => $order::STATUS['DECLINED']
            ]);
            SMS::compose($order->user->phone,'Your purchase is declined . order id :#'.$order->id)->send();
            DB::commit();
            return $order;
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        } catch (Error $error) {
            DB::rollBack();
            throw $error;
        }
    }
}
