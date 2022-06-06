@extends('frontEnd.layouts.app')
@section('content')
    <!-- bratcam area  start-->
    <section class="bradcam">
        <div class="container">
            <h3 class="text-white pt-5 pb-3">Payment getaway</h3>
            <p class="pb-5 text-white">
                <a href="{{ route('home_page') }}" class="text-decoration-none bradcam-active-btn pe-2">Home</a>
                /
                <a href="" class="text-decoration-none text-white ps-2">Sing In</a>
            </p>
        </div>

    </section>
    <!-- bratcam area  end-->
    <div class="container my-5">
        <div class="  d-flex flex-column justify-content-center align-items-center gap-3">
          
            <h3>
            Bkash : 017955****1
            </h3>
              <div class="card shadow w-100" >
                <div class="card-body d-flex justify-content-center align-items-center " >
                    <form action="{{ route('orderStore') }}" class="w-75" method="POST">
                        @csrf
                        <div class="form-group ">
                            <label for="exampleInputEmail1" class="mb-3">Transaction Id</label>
                            <input type="hidden" name="type" value="{{$type}}">
                            <input type="hidden" name="id" value="{{$id}}">
                            <input type="text" name="trnxId" class="form-control border border-dark " id="trnxId" required
                                placeholder="Enter Transaction Id">
                            @error('trnxId')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>


                        <button type="submit" class="btn btn-outline-dark mt-3">Pay</button>
                    </form>
                </div>
            </div>
                <div class="card w-100  shadow">
                <div class="card-body ">
                   

                    <table class="table table-striped">
                     <tr>
                            <td colspan='2' class="h4">
                                Buyer Information :
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Name :
                            </th>
                            <td>
                                {{ auth()->user()->name }}
                            </td>
                        </tr>
                        
                        <tr>
                            <th>
                                Phone :
                            </th>
                            <td>
                                {{ auth()->user()->phone }}
                            </td>
                        </tr>
                
                        <tr>
                            <td colspan='2' class="h4">
                                Purchase Information :
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Type :
                            </th>
                            <td>
                                {{ $data->information()['type'] }}
                            </td>
                        </tr>
                        <tr>
                        <tr>
                            <th>
                                Title :
                            </th>
                            <td>
                                {{ $data->information()['title'] }}
                            </td>
                        </tr>
                        <th>
                            Price :
                        </th>
                        <td>
                            {{ $data->information()['price'] }} BDT
                        </td>
                        </tr>
                    </table>

                </div>
            </div>

        </div>


    </div>
@endsection
