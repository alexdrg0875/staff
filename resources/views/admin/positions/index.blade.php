@extends('layouts.admin');

@section('content')

    @if(Session::has('deleted_position'))
        <p class="bg-danger">{{session('deleted_position')}}</p>
    @endif

    @if(Session::has('updated_position'))
        <p class="bg-success">{{session('updated_position')}}</p>
    @endif

    <h2 class="bg-primary text-center">POSITIONS</h2>
    <div class="col-sm-6">
        {!! Form::open(['method'=>'POST', 'action'=>'AdminPositionsController@store']) !!}

        <div class="form-group">

            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}

        </div>

        <div class="form-group">


            {!! Form::submit('Create position', ['class'=>'btn btn-primary']) !!}

        </div>

        {!! Form::close() !!}


    </div>

    <div class="col-sm-6">
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created</th>
            </tr>
            </thead>
            <tbody>

            @if($positions)
                @foreach($positions as $position)
                    <tr>
                        <td>{{$position->id}}</td>
                        <td><a href="{{'positions/'. $position->id . '/edit'}}">{{Str::limit($position->name,20)}}</a></td>
                        <td>{{$position->created_at ? $position->created_at->diffForHumans() : 'date not assigned'}}</td>
                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>

    </div>

@endsection

{{--@extends('footer');--}}