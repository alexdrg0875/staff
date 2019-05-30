@extends('layouts/admin')

@section('content')
    <h2 class="bg-primary text-center">CREATE NEW USER</h2>

    <div class="row">

        {!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'files'=>true]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'E-mail:') !!}
            {!! Form::email('email', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('role_id', 'Role:') !!}
            {!! Form::select('role_id',['' => 'Choose options'] + $roles, null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('is_active', 'Status:') !!}
            {!! Form::select('is_active', array(1 => 'Active', 0 => 'Not active'), 0, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('photo_id', 'Avatar:') !!}
            {!! Form::file('photo_id', ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::password('password', ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">

            {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}

        </div>

        {!! Form::close() !!}
    </div>
    <div class="row">
        @include('includes.form_error')
    </div>
@endsection

@section('footer')
@endsection