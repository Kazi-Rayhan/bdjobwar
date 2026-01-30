@extends('frontEnd.layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-danger text-white">
                    <h2 class="mb-0">Account Deletion Request</h2>
                </div>
                <div class="card-body p-4">
                    <h4 class="mb-3">অ্যাকাউন্ট মুছে ফেলার অনুরোধ</h4>
                    
                    <div class="alert alert-warning">
                        <strong>সতর্কতা:</strong> আপনার অ্যাকাউন্ট মুছে ফেলার অনুরোধ করার পর, আপনার সমস্ত তথ্য এবং ডেটা স্থায়ীভাবে মুছে যাবে। এই কাজটি অপরিবর্তনীয়।
                    </div>

                    <p class="text-justify mb-4">
                        আপনি যদি আপনার অ্যাকাউন্ট এবং সমস্ত তথ্য মুছে ফেলতে চান, অনুগ্রহ করে নিচের ফর্মটি পূরণ করুন। আমরা আপনার অনুরোধ পর্যালোচনা করার পর আপনার অ্যাকাউন্ট এবং তথ্য মুছে ফেলব।
                    </p>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('delete-account-and-information') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">নাম <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" 
                                   value="{{ old('name', auth()->check() ? auth()->user()->name : '') }}" 
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">ইমেইল ঠিকানা <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" 
                                   value="{{ old('email', auth()->check() ? auth()->user()->email : '') }}" 
                                   required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">ফোন নম্বর</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                                   id="phone" name="phone" 
                                   value="{{ old('phone', auth()->check() ? auth()->user()->phone : '') }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="reason" class="form-label">অ্যাকাউন্ট মুছে ফেলার কারণ <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('reason') is-invalid @enderror" 
                                      id="reason" name="reason" rows="4" 
                                      required>{{ old('reason') }}</textarea>
                            @error('reason')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input @error('confirm') is-invalid @enderror" 
                                   id="confirm" name="confirm" value="1" required>
                            <label class="form-check-label" for="confirm">
                                আমি নিশ্চিত করছি যে আমি আমার অ্যাকাউন্ট এবং সমস্ত তথ্য মুছে ফেলতে চাই। <span class="text-danger">*</span>
                            </label>
                            @error('confirm')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-danger btn-lg">
                                <i class="fas fa-trash-alt"></i> অ্যাকাউন্ট মুছে ফেলার অনুরোধ পাঠান
                            </button>
                            <a href="{{ route('home_page') }}" class="btn btn-secondary">
                                বাতিল করুন
                            </a>
                        </div>
                    </form>

                    <div class="mt-4">
                        <p class="text-muted small">
                            <strong>দ্রষ্টব্য:</strong> আপনার অনুরোধ পাওয়ার পর, আমরা ৭-১০ কার্যদিবসের মধ্যে আপনার অ্যাকাউন্ট এবং তথ্য মুছে ফেলব। আপনি একটি ইমেইল নিশ্চিতকরণ পাবেন।
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
