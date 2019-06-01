@extends('layouts.admin')

@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" class="css">

@endsection

@section('content')

    <h2 class="bg-primary text-center">Upload files</h2>

    {!! Form::open(['method'=>'POST', 'action'=>'AdminMediasController@store', 'class' => 'dropzone','files'=>true]) !!}

    {{--<div class="form-group">--}}

    {{--{!! Form::label('title', 'Title:') !!}--}}

    {{--{!! Form::text('title', null, ['class'=>'form-control']) !!}--}}

    {{--{!! Form::label('content', 'Content:') !!}--}}

    {{--{!! Form::text('content', null, ['class'=>'form-control']) !!}--}}

    {{--{!! Form::hidden('user_id', '0', ['class'=>'form-control']) !!}--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
    {{--{!! Form::file('file', ['class'=>'form-control']) !!}--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}


    {{--{!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}--}}

    {{--</div>--}}

    {!! Form::close() !!}



@endsection


@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

@endsection