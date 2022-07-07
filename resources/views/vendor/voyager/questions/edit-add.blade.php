@php
$edit = !is_null($dataTypeContent->getKey());
$add = is_null($dataTypeContent->getKey());
@endphp

@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        #title input{
            height: 50px;
        }
        #title{
            font-size: 20px;
            color: #000;
        }
    </style>
    @stop

@section('page_title', __('voyager::generic.' . ($edit ? 'edit' : 'add')) . ' ' .
    $dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.' . ($edit ? 'edit' : 'add')) . ' ' . $dataType->getTranslatedAttribute('display_name_singular') }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">

        <div class="row">

            <div class="col-md-12">

                <div class="panel panel-bordered " style="background-color: #e9ecef;">
                    <!-- form start -->
                    <form role="form" class="form-edit-add"
                        action="{{ $edit ? route('voyager.' . $dataType->slug . '.update', $dataTypeContent->getKey()) : route('voyager.' . $dataType->slug . '.store') }}"
                        method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                        @if ($edit)
                            {{ method_field('PUT') }}
                        @endif

                        <!-- CSRF TOKEN -->
                        {{ csrf_field() }}

                        <div class="panel-body">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Adding / Editing -->
                            @php
                                $dataTypeRows = $dataType->{$edit ? 'editRows' : 'addRows'};
                            @endphp
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">

                                @foreach ($dataTypeRows as $row)
                                <!-- GET THE DISPLAY OPTIONS -->
                                @php
                                    $display_options = $row->details->display ?? null;
                                    if ($dataTypeContent->{$row->field . '_' . ($edit ? 'edit' : 'add')}) {
                                        $dataTypeContent->{$row->field} = $dataTypeContent->{$row->field . '_' . ($edit ? 'edit' : 'add')};
                                    }
                                @endphp
                                @if (isset($row->details->legend) && isset($row->details->legend->text))
                                    <legend class="text-{{ $row->details->legend->align ?? 'center' }}"
                                        style="background-color: {{ $row->details->legend->bgcolor ?? '#f0f0f0' }};padding: 5px;">
                                        {{ $row->details->legend->text }}</legend>
                                @endif

                                <div class="form-group @if ($row->type == 'hidden') hidden @endif col-md-{{ $display_options->width ?? 12 }} {{ $errors->has($row->field) ? 'has-error' : '' }}"
                                    @if (isset($display_options->id)) {{ "id=$display_options->id" }} @endif>
                                    {{ $row->slugify }}
                                    <label class="control-label"
                                        for="name">{{ $row->getTranslatedAttribute('display_name') }}</label>
                                    @include('voyager::multilingual.input-hidden-bread-edit-add')
                                    @if (isset($row->details->view))
                                        @include($row->details->view, [
                                            'row' => $row,
                                            'dataType' => $dataType,
                                            'dataTypeContent' => $dataTypeContent,
                                            'content' => $dataTypeContent->{$row->field},
                                            'action' => $edit ? 'edit' : 'add',
                                            'view' => $edit ? 'edit' : 'add',
                                            'options' => $row->details,
                                        ])
                                    @elseif ($row->type == 'relationship')
                                        @include('voyager::formfields.relationship', ['options' => $row->details])
                                    @else
                                        {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                    @endif

                                    @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                        {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                    @endforeach
                                    @if ($errors->has($row->field))
                                        @foreach ($errors->get($row->field) as $error)
                                            <span class="help-block">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            @endforeach
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                           
                            @if (request()->exam)
                                <input type="hidden" name="exam" value="{{ request()->exam }}">
                            @endif
                            
                            <div class="row ">
                                <div class="col-md-1"></div>
                                <div class="col-md-10" >
                                
                                    <div class="card " >
                                    <div class="card-body " >
                                    @if ($edit)

                                
                                    @foreach( $dataTypeContent->choices as $choice)
                                    <div class="accordion "  id="accordionChoice{{$choice->index}}">
                                        <div class="card " >
                                            <div class="card-header"  id="heading0{{$choice->index}}">
                                                <div class="form-group" >
                                                    <label class="sr-only" for="choice{{$choice->index}}">Choice</label>
                                                    <div class="input-group ">
                                                        <div class="input-group-addon ">{{$choice->label}}</div>
                                                         <input type="hidden" name="options[{{$choice->index}}][index]" class="form-control" value="{{$choice->index}}">
                                                       
                                                        <input type="hidden" class="form-control" id="choice{{$choice->index}}Id"  placeholder="Enter choice {{$choice->label}}" name="options[{{$choice->index}}][id]" value="{{$choice->id}}">
                                                        <input type="text" class="form-control" id="choice{{$choice->index}}"  placeholder="Enter choice {{$choice->label}}" name="options[{{$choice->index}}][choice_text]" value="{{$choice->choice_text}}">
                                                        <div class="input-group-addon"><input name="answer" @if($dataTypeContent->answer == $choice->index) checked='true' @endif value="{{$choice->index}}" type="radio">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary" type="button" data-toggle="collapse"
                                                    data-target="#collapse0{{$choice->index}}" aria-expanded="true"
                                                    aria-controls="collapse0{{$choice->index}}">
                                                    Add Image with option {{$choice->label}} (if necessary) 
                                                </button>


                                            </div>

                                            <div id="collapse0{{$choice->index}}" class="collapse " aria-labelledby="heading0{{$choice->index}}"
                                                data-parent="#accordionChoice{{$choice->index}}">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label 
                                                            for="choiceImage{{$choice->index}}">Image {{$choice->label}}</label>

                                                        <input type="file" class="form-control" id="choiceImage{{$choice->index}}" name="options[{{$choice->index}}][choice_image]"
                                                            placeholder="Enter choice">
                                                        @if($choice->choice_image)
                                                        <img src="{{Voyager::image($choice->choice_image)}}" height="80" style="object-fit:cover" alt="">
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    @foreach([1=>'A',2=>'B',3=>'C',4=>'D'] as $key=>$value)
                                    <div class="accordion" id="accordionChoice{{$key}}">
                                        <div class="card">
                                            <div class="card-header" id="heading0{{$key}}">
                                                <div class="form-group">
                                                    <label class="sr-only" for="choice{{$key}}">Choice</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon " style="color:#fff;background-color: #2ecc71;">{{$value}}</div>
                                                         <input type="hidden" name="options[{{$key}}][index]" class="form-control" value="{{$key}}">
                                                        <input type="text" class="form-control" id="choice{{$key}}"
                                                            placeholder="Enter choice {{$value}}" name="options[{{$key}}][choice_text]">
                                                        <div class="input-group-addon" ><input name="answer" value="{{$key}}" type="radio">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary" type="button" data-toggle="collapse"
                                                    data-target="#collapse0{{$key}}" aria-expanded="true"
                                                    aria-controls="collapse0{{$key}}">
                                                    Add Image 
                                                </button>


                                            </div>

                                            <div id="collapse0{{$key}}" class="collapse " aria-labelledby="heading0{{$key}}"
                                                data-parent="#accordionChoice{{$key}}">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label 
                                                            for="choiceImage{{$key}}">Image {{$value}}</label>

                                                        <input type="file" class="form-control" id="choiceImage{{$key}}" name="options[{{$key}}][choice_image]"
                                                            placeholder="Enter choice">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                        
                                    <div class="accordion" id="accordionChoiceDescription">
                                        <div class="card">
                                            <div class="card-header" id="headingDescription">
                                                <div class="form-group">
                                                        <label for="">Description</label>
                                                        <input type="text" name="description" id="" value="{{old('description') ?? @$dataTypeContent->description}}"  class="form-control">
                                                    
                                                </div>
                                                <button class="btn btn-primary" type="button" data-toggle="collapse"
                                                    data-target="#collapseDescription" aria-expanded="true"
                                                    aria-controls="collapseDescription">
                                                    Add Image  
                                                </button>


                                            </div>

                                            <div id="collapseDescription" class="collapse " aria-labelledby="headingDescription"
                                                data-parent="#accordionChoiceDescription">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label 
                                                            for="choiceImageDescription">Image </label>

                                                        <input type="file" class="form-control" id="choiceImageDescription" name="image"
                                                            placeholder="Enter choice">
                                                            @if($dataTypeContent->image)
                                                        <img src="{{Voyager::image($dataTypeContent->image)}}" height="80" style="object-fit:cover" alt="">
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    </div>


                                </div>
                                
                                <div class="col-md-1"></div>
                                
                            </div>
                                 
                        </div><!-- panel-body -->


                        <div class=" " style="display: flex;justify-content: end;background-color: #e9ecef;" >
                        @section('submit-buttons')
                            <button type="submit" class="btn  btn-primary save " style="height: 60px ; width: 120px ;margin-right:150px ;" >{{ __('voyager::generic.save') }}</button>
                        @stop
                        @yield('submit-buttons')
                    </div>
                </form>

                <iframe id="form_target" name="form_target" style="display:none"></iframe>
                <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                    enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                    <input name="image" id="upload_file" type="file" onchange="$('#my_form').submit();this.value='';">
                    <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
                    {{ csrf_field() }}
                </form>

            </div>

        </div>
        @if (!$edit)
        <div class="container">

            <div class="row">
                @foreach ($exam->questions as $question)
                <div class="col-md-12">
                    <x-questionAdmin :iteration="$loop->iteration" :question="$question" :index="$loop->iteration" />
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>

<div class="modal fade modal-danger" id="confirm_delete_modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}
                </h4>
            </div>

            <div class="modal-body">
                <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                    data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                <button type="button" class="btn btn-danger"
                    id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}</button>
            </div>
        </div>
    </div>
</div>
{{-- Single delete modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> {{ __('voyager::generic.delete_question') }} {{ strtolower($dataType->getTranslatedAttribute('display_name_singular')) }}?</h4>
                </div>
                <div class="modal-footer">
                    <form action="#" id="delete_form" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm" value="{{ __('voyager::generic.delete_confirm') }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<!-- End Delete File Modal -->
@stop

@section('javascript')
<script>
    var params = {};
    var $file;
    function deleteHandler(tag, isMulti) {
        return function() {
            $file = $(this).siblings(tag);
            params = {
                slug: '{{ $dataType->slug }}',
                filename: $file.data('file-name'),
                id: $file.data('id'),
                field: $file.parent().data('field-name'),
                multi: isMulti,
                _token: '{{ csrf_token() }}'
            }
            $('.confirm_delete_name').text(params.filename);
            $('#confirm_delete_modal').modal('show');
        };
    }
    $('document').ready(function() {
        $('.toggleswitch').bootstrapToggle();
        //Init datepicker for date fields if data-datepicker attribute defined
        //or if browser does not handle date inputs
        $('.form-group input[type=date]').each(function(idx, elt) {
            if (elt.hasAttribute('data-datepicker')) {
                elt.type = 'text';
                $(elt).datetimepicker($(elt).data('datepicker'));
            } else if (elt.type != 'date') {
                elt.type = 'text';
                $(elt).datetimepicker({
                    format: 'L',
                    extraFormats: ['YYYY-MM-DD']
                }).datetimepicker($(elt).data('datepicker'));
            }
        });
        @if ($isModelTranslatable)
            $('.side-body').multilingual({
                "editing": true
            });
        @endif
        $('.side-body input[data-slug-origin]').each(function(i, el) {
            $(el).slugify();
        });
        $('.form-group').on('click', '.remove-multi-image', deleteHandler('img', true));
        $('.form-group').on('click', '.remove-single-image', deleteHandler('img', false));
        $('.form-group').on('click', '.remove-multi-file', deleteHandler('a', true));
        $('.form-group').on('click', '.remove-single-file', deleteHandler('a', false));
        $('#confirm_delete').on('click', function() {
            $.post('{{ route('voyager.' . $dataType->slug . '.media.remove') }}', params, function(
                response) {
                if (response &&
                    response.data &&
                    response.data.status &&
                    response.data.status == 200) {
                    toastr.success(response.data.message);
                    $file.parent().fadeOut(300, function() {
                        $(this).remove();
                    })
                } else {
                    toastr.error("Error removing file.");
                }
            });
            $('#confirm_delete_modal').modal('hide');
        });
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

@if (request()->exam)
    <script>
        $('#exams').hide();
    </script>
@endif
<script>
     var deleteFormAction;
    
        $('.actions').on('click', '.delete', function (e) {
            console.log('asdasd');
            $('#delete_form')[0].action = '{{ route('voyager.questions.destroy', '__id') }}'.replace('__id', $(this).data('id'));
            $('#delete_modal').modal('show');
        });
</script>

@stop
