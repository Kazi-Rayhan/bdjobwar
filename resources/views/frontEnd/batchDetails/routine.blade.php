@extends('frontEnd.layouts.app')

@section('content')
    <h2 class="m-5 ">
        রুটিন
    </h2>
    @if ($batch->routine)
        <div class="container ">
            <a href="{{ Voyager::image(json_decode($batch->routine)[0]->download_link) }}"
                class="btn btn-outline-primary mb-2"> ডাউনলোড করুন <i class="fas fa-download"></i></a>
            <div id='viewer' style="width:1024px;height:600px;margin:0 auto"></div>
        </div>
    @else
        <div class="container text-center my-5">
            <img src="{{ asset('icons/routine.svg') }}" height="200px" class="mb-5" alt="">
            <h1>এই মুহূর্তে কোন রুটিন নেই।</h1>
            <h5>
                পড়ে আবার চেক করুণ
            </h5>
        </div>
    @endif
@endsection
@section('js')
    <script src={{ asset('lib/webviewer.min.js') }}></script>
    <script>
        const link = "{{ Voyager::image(json_decode($batch->routine)[0]->download_link) }}";
        WebViewer({
                path: '/lib', // path to the PDF.js Express'lib' folder on your server
                licenseKey: 'EbVBz5i0x73ljZtKBc6c',
                initialDoc: link,
                // initialDoc: '/path/to/my/file.pdf',  // You can also use documents on your server
            }, document.getElementById('viewer'))
            .then(instance => {
                // now you can access APIs through the WebViewer instance
                const {
                    Core,
                    UI
                } = instance;

                // adding an event listener for when a document is loaded
                Core.documentViewer.addEventListener('documentLoaded', () => {
                    console.log('document loaded');
                });

                // adding an event listener for when the page number has changed
                Core.documentViewer.addEventListener('pageNumberUpdated', (pageNumber) => {
                    console.log(`Page number is: ${pageNumber}`);
                });
            });
    </script>
@endsection
