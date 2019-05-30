@extends('layouts/admin')

@section('content')
    <h2 class="bg-primary text-center">EDIT USER - {{$user->name}}</h2>

    <div class="row">
        <div class="col-sm-3">

            <img src="{{$user->photo ? $user->photo->path : '/images/avatar_default.jpg'}}" alt="user avatar" class="img-responsive img-rounded">

        </div>

        <div class="col-sm-9">

            {{--Form::model($user, recive all user infrmation in form inputs--}}
            {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update',$user->id], 'files'=>true]) !!}

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
                {!! Form::select('role_id', $roles, null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('is_active', 'Status:') !!}
                {!! Form::select('is_active', array(1 => 'Active', 0 => 'Not active'), null, ['class'=>'form-control']) !!}
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

                {!! Form::submit('Update User', ['class'=>'btn btn-primary col-sm-2']) !!}

            </div>

            {!! Form::close() !!}

            {!! Form::model($user, ['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}

            <div class="form-group">

                {!! Form::submit('Delete user', ['class'=>'btn btn-danger col-sm-2']) !!}

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