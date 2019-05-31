@extends('layouts.admin')


@section('content')

    <h2 class="bg-primary text-center">CREATE NEW EMPLOYEE</h2>
    <div class="row">
        {!! Form::open(['method'=>'POST', 'action'=>'AdminStaffController@store', 'files'=>true]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('position_id', 'Position:') !!}
            {!! Form::select('position_id',['' => 'Choose position'] + $positions, null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('photo_id', 'Photo:') !!}
            {!! Form::file('photo_id', ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('salary', 'Salary:') !!}
            {!! Form::text('salary', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('parent_id', 'Chief:') !!}
            {!! Form::select('parent_id',['' => 'Choose chief'] + $chiefs, null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('started_at', 'Start working:') !!}
            {!! Form::date('started_at', null, ['class'=>'form-control']) !!}
        </div>



        <div class="form-group">

            {!! Form::submit('Create employee', ['class'=>'btn btn-primary']) !!}

        </div>

        {!! Form::close() !!}

    </div>
    <div class="row">

        @include('includes.form_error')

    </div>
@endsection

@section('footer')
@endsection