@extends('layouts/admin')

@section('content')
    @if(Session::has('deleted_user'))
        <p class="bg-danger">{{session('deleted_user')}}</p>
    @endif

    <h2 class="bg-primary text-center">REGISTERED USERS</h2>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>

        @if($users)
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>
                        <a href="{{'users/'. $user->id . '/edit'}}">
                            <img height="50" src="{{$user->photo ? $user->photo->path : '/images/avatar_default.jpg'}}" alt="user photo">
                        </a>
                    </td>
                    <td><a href="{{'users/'. $user->id . '/edit'}}">{{$user->name}}</a></td>
                    {{--<td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>--}}
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->is_active ? 'Active' : 'Not active'}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
@endsection

@section('footer')
@endsection