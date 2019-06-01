@extends('layouts/admin')

@section('content')
    <h2 class="bg-primary text-center">Edit position - {{$position->name}}</h2>

    <div class="row">

        <div class="col-sm-9">

            {{--Form::model($user, recive all user infrmation in form inputs--}}
            {!! Form::model($position, ['method'=>'PATCH', 'action'=>['AdminPositionsController@update',$position->id]]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">

                {!! Form::submit('Update Position', ['class'=>'btn btn-primary col-sm-2']) !!}

            </div>

            {!! Form::close() !!}



            {!! Form::model($position, ['method'=>'DELETE', 'action'=>['AdminPositionsController@destroy', $position->id]]) !!}

            <div class="form-group">

                {!! Form::submit('Delete position', ['class'=>'btn btn-danger col-sm-2']) !!}

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