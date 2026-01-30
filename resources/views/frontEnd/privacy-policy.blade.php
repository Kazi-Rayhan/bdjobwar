@extends('frontEnd.layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Privacy Policy</h2>
                </div>
                <div class="card-body p-4">
                    <h4 class="mb-3">গোপনীয়তা নীতি</h4>
                    <p class="text-justify">
                        BDJobWar আপনার গোপনীয়তা রক্ষায় প্রতিশ্রুতিবদ্ধ। এই গোপনীয়তা নীতিটি ব্যাখ্যা করে যে আমরা কীভাবে আপনার ব্যক্তিগত তথ্য সংগ্রহ, ব্যবহার এবং সুরক্ষা করি।
                    </p>
                    
                    <h5 class="mt-4 mb-3">তথ্য সংগ্রহ</h5>
                    <p class="text-justify">
                        আমরা নিম্নলিখিত তথ্য সংগ্রহ করি:
                    </p>
                    <ul>
                        <li>নাম, ইমেইল ঠিকানা, ফোন নম্বর</li>
                        <li>অ্যাকাউন্ট সেটিংস এবং পছন্দসমূহ</li>
                        <li>পরীক্ষার ফলাফল এবং অগ্রগতি</li>
                        <li>পেমেন্ট তথ্য (সুরক্ষিত পেমেন্ট গেটওয়েতে)</li>
                    </ul>

                    <h5 class="mt-4 mb-3">তথ্য ব্যবহার</h5>
                    <p class="text-justify">
                        আমরা আপনার তথ্য ব্যবহার করি:
                    </p>
                    <ul>
                        <li>আমাদের পরিষেবা প্রদান করতে</li>
                        <li>আপনার অ্যাকাউন্ট পরিচালনা করতে</li>
                        <li>আমাদের পরিষেবা উন্নত করতে</li>
                        <li>আপনাকে গুরুত্বপূর্ণ আপডেট জানাতে</li>
                    </ul>

                    <h5 class="mt-4 mb-3">তথ্য সুরক্ষা</h5>
                    <p class="text-justify">
                        আমরা আপনার তথ্য সুরক্ষিত রাখতে শিল্প-মানের নিরাপত্তা ব্যবস্থা ব্যবহার করি। আপনার তথ্য তৃতীয় পক্ষের সাথে শেয়ার করা হবে না, আইন দ্বারা প্রয়োজনীয় ক্ষেত্রে ছাড়া।
                    </p>

                    <h5 class="mt-4 mb-3">কুকিজ</h5>
                    <p class="text-justify">
                        আমাদের ওয়েবসাইট আপনার অভিজ্ঞতা উন্নত করতে কুকিজ ব্যবহার করে। আপনি আপনার ব্রাউজার সেটিংস থেকে কুকিজ নিয়ন্ত্রণ করতে পারেন।
                    </p>

                    <h5 class="mt-4 mb-3">আপনার অধিকার</h5>
                    <p class="text-justify">
                        আপনার অধিকার রয়েছে:
                    </p>
                    <ul>
                        <li>আপনার ব্যক্তিগত তথ্য অ্যাক্সেস করতে</li>
                        <li>আপনার তথ্য সংশোধন করতে</li>
                        <li>আপনার অ্যাকাউন্ট মুছে ফেলতে</li>
                        <li>তথ্য ব্যবহারে আপত্তি করতে</li>
                    </ul>

                    <h5 class="mt-4 mb-3">যোগাযোগ</h5>
                    <p class="text-justify">
                        গোপনীয়তা সংক্রান্ত কোনো প্রশ্নের জন্য, অনুগ্রহ করে আমাদের সাথে যোগাযোগ করুন: <a href="mailto:info@bdjobwar.com">info@bdjobwar.com</a>
                    </p>

                    <p class="text-muted mt-4">
                        <small>সর্বশেষ আপডেট: {{ date('F Y') }}</small>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
