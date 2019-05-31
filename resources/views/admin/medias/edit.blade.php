@extends('layouts.admin')


@section('content')
    <h2 class="bg-primary text-center">MEDIA PREVIEW</h2>

    <img height="800" src="{{$photo->path}}" alt="big image">



@endsection


