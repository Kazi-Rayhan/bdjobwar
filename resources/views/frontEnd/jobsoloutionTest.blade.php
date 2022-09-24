 @extends('frontEnd.layouts.app')
 @section('content')
     <div class="container my-5">
         <h3 class="text-success">
             Job Solutions
         </h3>
         <div class="contianer">
             <div class="row">
                 <div class="col-md-4">

                 </div>
                 <div class="col-md-8">
                     <table class="table">
                         <tr>
                             <th>
                                 #
                             </th>
                             <th>
                                 Exam
                             </th>
                             <th>
                                 Subjects
                             </th>
                             <th>
                                 Actions
                             </th>
                         </tr>
                         @foreach ($exams as $exam)
                             <tr>
                                 <td>
                                     {{ $loop->iteration }}
                                 </td>
                                 <td>
                                     <h6 class="text-dark" style="font-weight: 700;">{{ $exam->title }}</h6>
                                     <p class="text-secondary mt-2" style="font-size: 14px;">
                                         {{ $exam->sub_title }}
                                     </p>
                                 </td>
                                 <td>
                                     {{ join(' ,', $exam->subjects->pluck('name')->toArray()) }}
                                 </td>
                                 <td>
                                     <a class="btn btn-primary" href="{{ route('exam.read', $exam->uuid) }}">পড়ুন</a>
                                 </td>
                             </tr>
                         @endforeach

                     </table>
                     {{ $exams->links() }}
                 </div>
             </div>
         </div>

     </div>
 @endsection
