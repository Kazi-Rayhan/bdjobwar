<?php
namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderServices{


    protected const MODEL = [
       'exam' => 'App\Models\Exam',
       'package' => 'App\Models\Package',
    ];

    protected string $trnxId;
    protected $model;
    
   
    public function __construct(string $type = null, int $id = null, string $trnxId = null)
    {   
        $this->trnxId = $trnxId;
        $this->model = $this::MODEL[$type]::find($id);

    }

    public static function make(string $type , int $id , string $trnxId ){
        return new static($type,$id,$trnxId);
    }

    public function save(): Order
    {
        
       $order = $this->model->orders()->create([
            'user_id' => Auth::id(),
            'method' => Order::METHOD['BKASH'],
            'status' => Order::STATUS['PENDING'],
            'trnxId' => $this->trnxId,
            'price' => $this->model->price
        ]);

        return $order;
    }


}