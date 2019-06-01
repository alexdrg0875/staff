@extends('layouts.admin')


@section('content')
    @if(Session::has('deleted_employee'))
        <p class="bg-danger">{{session('deleted_employee')}}</p>
    @endif

    @if(Session::has('updated_employee'))
        <p class="bg-success">{{session('updated_employee')}}</p>
    @endif

    <h2 class="bg-primary text-center">List of employees</h2>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Position</th>
            <th>Salary</th>
            <th>Chief</th>
            <th>Start working</th>
            <th>Created by</th>
        </tr>
        </thead>
        <tbody>

        @if($staff)
            @foreach($staff as $employee)
                <tr>
                    <td>{{$employee->id}}</td>
                    <td>
                        <a href="{{'staff/'. $employee->id . '/edit'}}">
                            <img height="50" src="{{$employee->photo ? $employee->photo->path : '/images/employee_default.jpg'}}" alt="employee photo">
                        </a>
                    </td>
                    <td><a href="{{'staff/'. $employee->id . '/edit'}}">{{Str::limit($employee->name,20)}}</a></td>
                    <td>{{$employee->position ? $employee->position->name : 'Non positioned'}}</td>
                    <td>{{$employee->salary}}</td>
                    <td>{{$employee->parent ? $employee->parent->name : 'Has no chief'}}</td>
                    <td>{{$employee->started_at ? $employee->started_at->format('d.m.Y') : 'No data'}}</td>
                    <td>{{$employee->user ? $employee->user->name : 'Data not assigned'}}</td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>

@endsection

@section('footer')
@endsection