@extends('frontEnd.layouts.app')
@section('content')
    <!-- bratcam area  start-->
    <section class="bradcam">
        <div class="container">
            <h3 class="text-white pt-5 pb-3">অর্থপ্রদান</h3>
            <p class="pb-5 text-white">
                <a href="{{ route('home_page') }}" class="text-decoration-none bradcam-active-btn pe-2">হোম</a>
                /
                <a href="" class="text-decoration-none text-white ps-2">অর্থপ্রদান</a>
            </p>
        </div>

    </section>
    <!-- bratcam area  end-->
    <div class="container my-5">
        <div class="  d-flex flex-column justify-content-center align-items-center gap-3">
          
            <h3>
            টাকা পরিষদের অ্যাকাউন্ট 
            </h3>
            <h1>
            {{setting('site.payment_account_number')}}
            </h1>
              <div class="card shadow w-100" >
                <div class="card-body d-flex justify-content-center align-items-center " >
                    <form action="{{ route('orderStore') }}" class="w-75" method="POST">
                        @csrf
                         <input type="hidden" name="type" value="{{$type}}">
                            <input type="hidden" name="id" value="{{$id}}">
                            <div class="form-group ">
                            <label for="account" class="mb-3">অ্যাকাউন্ট </label>
                           
                            <input type="text" name="account" value="{{old('account')}}" class="form-control border border-dark @error('account') is-invalid @enderror" id="account" placeholder="আপনার বিকাশ, নগদ বা রকেট অ্যাকাউন্ট নম্বর লিখুন">
                            @error('account')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="form-group mt-2 ">
                            <label for="trnxId" class="mb-3">ট্রানজেকশন আইডি </label>
                           
                            <input type="text" name="trnxId" value="{{old('trnxId')}}" class="form-control border border-dark @error('trnxId') is-invalid @enderror" id="trnxId"
                                placeholder="ট্রানজেকশন আইডি লিখুন">
                            @error('trnxId')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="form-group mt-2 ">
                        <label for="method" class="mb-3">মূল্যপরিশোধ পদ্ধতি </label>
                        <select id="inputState" class="form-control @error('method') is-invalid @enderror" name="method">
                            <option value=""selected>Choose...</option>
                            <option value="0">Bkash</option>
                            <option value="1">Nagad</option>
                            <option value="2">Rocket</option>
                      
                        </select>
                            @error('method')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="form-group mt-2 ">
                            <label for="exampleInputPrice" class="mb-3">মূল্য</label>
                           
                            <input type="text" class="form-control border border-dark " readonly id="exampleInputPrice" 
                                value="{{$data->information()['price']}}">
                           

                        </div>


                        <button type="submit" class="btn btn-outline-danger btn-lg mt-3">সম্পূর্ণ </button>
                    </form>
                </div>
            </div>
                <div class="card w-100  shadow">
                <div class="card-body ">
                   

                    <table class="table table-striped">
                     <tr>
                            <td colspan='2' class="h4">
                            ক্রেতার তথ্য: 
                            </td>
                        </tr>
                        <tr>
                            <th>
                            নাম: 
                            </th>
                            <td>
                                {{ auth()->user()->name }}
                            </td>
                        </tr>
                        
                        <tr>
                            <th>
                            ফোন: 
                            </th>
                            <td>
                                {{ auth()->user()->phone }}
                            </td>
                        </tr>
                
                        <tr>
                            <td colspan='2' class="h4">
                            ক্রয় তথ্য: 
                            </td>
                        </tr>
                        <tr>
                            <th>
                            প্রকার: 
                            </th>
                            <td>
                                {{ $data->information()['type'] }}
                            </td>
                        </tr>
                        <tr>
                        <tr>
                            <th>
                            শিরোনাম : 
                            </th>
                            <td>
                                {{ $data->information()['title'] }}
                            </td>
                        </tr>
                        <th>
                        মূল্য: 
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
