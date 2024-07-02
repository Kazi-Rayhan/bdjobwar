@extends('frontend.layouts.app')
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-4 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('givepin',request()->uuid)}}" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="">Pin</label>
                            <input type="pin"  name="pin" class="form-control">
                            <button class="btn btn-dark mt-2"><i class="fa fa-unlock"></i> Unlock</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
