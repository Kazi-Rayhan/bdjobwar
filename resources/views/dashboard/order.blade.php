@extends('dashboard.layouts.app')
@section('content')
<div class="container">



<div class="row">

    <div class="col-12">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Order Informations</h6>
            </div>
            
       
        </div>
        <table class="table">
            <thead class="bg-primary text-white">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Orders Info</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            @foreach($orders as $order)
            <tbody>
              
                <tr>
                <th scope="row">{{ $loop->iteration  }}</th>
                @if($order->orderable_type === 'App\Models\Package')
                <td>
                    <span class="font-weight-bold"> Package name :</span> {{$order->orderable->title}} <br>
                    <span class="font-weight-bold"> Package duration :</span> {{$order->orderable->duration}} days <br>
                </td>
                @endif
                <td>{{$order->price}}</td>
                <td>
                    <a href="{{route('invoice',$order)}}" class="btn btn-primary">Invoice</a>
                </td>
                </tr>
          
            
            </tbody>
            @endforeach
        </table>

    </div>




</div>

</div>
@endsection