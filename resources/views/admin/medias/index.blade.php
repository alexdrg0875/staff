@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_media'))
        <p class="bg-danger">{{session('deleted_media')}}</p>
    @endif

    <h2 class="bg-primary text-center">FILES</h2>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Path</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>

        @if($photos)
            @foreach($photos as $photo)
                <tr>
                    <td>{{$photo->id}}</td>
                    <td>
                        <a href="{{'medias/'. $photo->id . '/edit'}}">
                            <img height="50" src="{{$photo->path ? $photo->path : '/images/post_default.jpg'}}" alt="image photo">
                        </a>
                    </td>
                    <td><a href="{{'medias/'. $photo->id . '/edit'}}">{{Str::limit($photo->path,35)}}</a></td>
                    <td>{{$photo->created_at->diffForHumans()}}</td>
                    <td>{{$photo->updated_at->diffForHumans()}}</td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy', $photo->id]]) !!}

                        <div class="form-group">


                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}

                        </div>

                        {!! Form::close() !!}


                    </td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>

@endsection

@section('footer')
@endsection