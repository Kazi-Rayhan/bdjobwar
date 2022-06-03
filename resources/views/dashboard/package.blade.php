@extends('dashboard.layouts.app')
@section('content')
<div class="container">



<div class="row">

    <div class="col-12">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Package Information</h6>
            </div>
            <div class="card-body">
              <span class="font-weight-bold text-muted"> Package name : </span> <span>{{Auth()->user()->package->title}} </span> <br>
              <span class="font-weight-bold text-muted"> Price : </span> <span>{{Auth()->user()->package->price}} </span> <br>
              <span class="font-weight-bold text-muted"> Duration : </span> <span>{{Auth()->user()->package->duration}} days</span> <br>
              
            </div> 
        </div>

    </div>




</div>

</div>
@endsection