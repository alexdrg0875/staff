@extends('layouts.admin')


@section('content')

    <h2 class="bg-primary text-center">EDIT EMPLOYEE DATA - {{$employee->name}}</h2>

    <div class="row">

        <div class="col-sm-3">

            <img src="{{$employee->photo ? $employee->photo->path : '/images/employee_default.jpg'}}" alt="employee photo" class="img-responsive img-rounded">

        </div>

        <div class="col-sm-9">
            {!! Form::model($employee, ['method'=>'PATCH', 'action'=>['AdminStaffController@update',$employee->id], 'files'=>true]) !!}

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
                {!! Form::text('parent_id', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('started_at', 'Start working:') !!}
                {!! Form::date('started_at', null, ['class'=>'form-control']) !!}
            </div>


            <div class="form-group">

                {!! Form::submit('Edit employee data', ['class'=>'btn btn-primary col-sm-2']) !!}

            </div>

            {!! Form::close() !!}

            {!! Form::model($employee, ['method'=>'DELETE', 'action'=>['AdminStaffController@destroy', $employee->id]]) !!}

            <div class="form-group">

                {!! Form::submit('Delete employee data', ['class'=>'btn btn-danger col-sm-2']) !!}

            </div>

            {!! Form::close() !!}

        </div>
    </div>

    <div class="row">

        @include('includes.form_error')

    </div>
@endsection

@section('footer')
@endsection
