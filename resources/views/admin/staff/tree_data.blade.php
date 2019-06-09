{{--{{\App\Http\Controllers\AdminStaffController::htmlTreeBuilder($staff)}}--}}
<ul class = "treeCSS">
    @foreach ($staff as $row)
    <li style="cursor:pointer" id="{{$row->id}}" onclick="loadTree({{$row->id}})">
        {{$row->name}} (<b>Position: </b>{{$row->position->name}} / <b>Employment date: </b>{{$row->started_at->format('d.m.Y')}}<b> / Salary: </b> {{$row->salary}} UAH)
        <span id="id_{{$row->id}}"></span></li>
    @endforeach
</ul>

