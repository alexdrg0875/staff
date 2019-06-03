@extends('layouts.admin')


@section('content')
    <h2 class="bg-primary text-center">File preview</h2>

    <img width="50%" src="{{$photo->path}}" alt="big image">



@endsection


