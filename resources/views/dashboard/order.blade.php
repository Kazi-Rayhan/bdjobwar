@extends('dashboard.layouts.app')
@section('content')
<div class="container">



<div class="row">

    <div class="col-12">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Order Informations</h6>
            </div>
            
       
        </div>
        @if($orders->count() >0)
        <table class="table">
            <thead class="bg-success text-white">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Orders Info</th>
                <th scope="col">
                    Status
                </th>
               
                <th scope="col">
                    Account
                </th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            @foreach($orders as $order)
            <tbody>
              
                <tr>
                <th scope="row">{{ $loop->iteration  }}</th>
                <td>
                    
                        @foreach($order->orderable->information() as $key => $value)
                        {{ucfirst($key)}} : {{$value}} <br>
                        @endforeach
                    </ul>
                </td>
                <td>
                    {{array_search($order->status,$order::STATUS)}}
                </td>
               
                <td>
                   {{$order->account}} 
                </td>
                <td>
                    <a href="{{route('invoice',$order)}}" class="btn btn-success">Invoice</a>
                </td>
                </tr>
          
            
            </tbody>
            @endforeach
        </table>
        @else
				<h3 class="text-center"> You did not placed any order </h3>
        @endif

    </div>




</div>

</div>
@endsection