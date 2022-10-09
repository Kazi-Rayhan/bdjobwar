@extends('frontEnd.layouts.app')
@section('content')
    <!-- bratcam area  end-->
    <div class="container my-5">
        <div class="  d-flex flex-column justify-content-center align-items-center gap-3">

            @if ($type == 'batch')
                <p>
                    {{ $data->payment_qoute }}
                </p>
            @elseif($type == 'package')
                <p>
                    {{ $data->payment_qoute }}
                </p>
            @endif
            <div class="card shadow w-100">
                <div class="card-body d-flex justify-content-center align-items-center ">
                    <form action="{{ route('orderStore') }}" class="w-75" method="POST">
                        @csrf
                        <input type="hidden" name="type" value="{{ $type }}">
                        <input type="hidden" name="id" value="{{ $id }}">
                        <div class="form-group ">
                            <label for="account" class="mb-3">অ্যাকাউন্ট <span class="text-danger">*</span> <small>(যে
                                    নাম্বার থেকে টাকা দিয়েছেন)</small> </label>

                            <input type="text" name="account" value="{{ old('account') }}"
                                class="form-control border border-dark @error('account') is-invalid @enderror"
                                id="account" placeholder="আপনার বিকাশ, নগদ বা রকেট অ্যাকাউন্ট নম্বর লিখুন">
                            @error('account')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="form-group mt-2 ">
                            <label for="trnxId" class="mb-3">ট্রানজেকশন আইডি <small>(যদি থাকে)</small> </label>

                            <input type="text" name="trnxId" value="{{ old('trnxId') }}"
                                class="form-control border border-dark @error('trnxId') is-invalid @enderror" id="trnxId"
                                placeholder="ট্রানজেকশন আইডি লিখুন (optional)">
                            @error('trnxId')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="form-group mt-2 ">
                            <label for="method" class="mb-3">মূল্যপরিশোধ পদ্ধতি <span class="text-danger">*</span>
                            </label>
                            <div class="form-check">
                                <input value="0" class="form-check-input" type="radio" name="method" id="bkash">
                                <label class="form-check-label" for="bkash">
                                    Bkash
                                </label>
                            </div>
                            <div class="form-check">
                                <input value="1" class="form-check-input" type="radio" name="method" id="nagad">
                                <label class="form-check-label" for="nagad">
                                    Nagad
                                </label>
                            </div>
                            <div class="form-check">
                                <input value="2" class="form-check-input" type="radio" name="method" id="rocket">
                                <label class="form-check-label" for="rocket">
                                    Rocket
                                </label>
                            </div>


                            @error('method')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="form-group mt-2 ">
                            <label for="exampleInputPrice" class="mb-3">মূল্য</label>

                            <input type="text" class="form-control border border-dark " readonly id="exampleInputPrice"
                                value="{{ $data->information()['price'] }}">


                        </div>


                        <button type="submit" class="btn btn-success btn-lg mt-3">সাবমিট</button>
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
    <!-- Modal -->

    <div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered ">
            <div class="modal-content ">

                <div class="modal-body mx-auto my-5" style="width:80%">
                    <div class="d-flex flex-column justify-content-center align-items-center gap-3">
                        <h5 class="text-center">
                            "{{ $data->title }}" এর সকল পরীক্ষা <br> দিতে  কোর্সটি কিনুন ।
                        </h5>

                        <button type="button" class="btn   btn-success" data-bs-dismiss="modal">কোর্স
                            টি
                            কিনুন</button>

                        <h5 class="text-center">
                            BD Job War ওয়েবসাইটের সকল কোর্সে পরীক্ষা দিতে চাইলে <br> প্যকেজ সাবস্ক্রাইব করুন ।
                        </h5>
                        <a class="btn btn-success " href="{{ route('home_page') }}#package">
                            প্যাকেজ
                            সাবস্ক্রাইব করুন</a>
                    </div>


                    <div class="d-flex justify-content-end  mt-5">
                        <a href="{{ route('home_page') }}" class="btn btn-primary mt-2">Close </a>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @if ($type == 'batch')
        <script>
            $(document).ready(function() {
                $("#staticBackdrop").modal('show');
            });
        </script>
    @endif
@endsection
