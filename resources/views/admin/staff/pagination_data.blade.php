@if($data)
    @foreach($data as $row)
        <tr>
            <td width="5%" class="text-center">{{$row->id}}</td>
            <td width="5%" class="text-center">
                <a href="{{'staff/'. $row->id . '/edit'}}">
                    <img height="50" src="/images/{{$row->photo ? $row->photo : 'employee_default.jpg'}}" alt="employee photo">
                </a>
            </td>
            <td width="20%"><a href="{{'staff/'. $row->id . '/edit'}}">{{$row->name}}</a></td>
            <td width="10%" class="text-center">{{$row->position}}</td>
            <td width="5%" class="text-center">{{$row->salary}}</td>
            <td width="20%">{{$row->chief ? $row->chief  : 'Has no chief'}}</td>
            <td width="7%" class="text-center">{{$row->employment_date ? date('d.m.Y', strtotime($row->employment_date)) : 'No data'}}</td>
            <td width="20%">{{$row->owner}}</td>

            {{--<td>{{$row->position ? $row->position->name : 'Non positioned'}}</td>--}}
            {{--<td>{{$row->parent ? $row->parent->name .' ('. $row->parent->position->name . ')' : 'Has no chief'}}</td>--}}
            {{--<td>{{$row->started_at ? $row->started_at->format('d.m.Y') : 'No data'}}</td>--}}
            {{--<td>{{$row->user ? $row->user->name : 'Data not assigned'}}</td>--}}
        </tr>
    @endforeach
@endif
<tr>
    <td colspan="8" align="center">
        {!! $data->links() !!}
    </td>
</tr>


