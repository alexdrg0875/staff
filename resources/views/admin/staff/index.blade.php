@extends('layouts.admin')


@section('content')
    @if(Session::has('deleted_employee'))
        <p class="bg-danger">{{session('deleted_employee')}}</p>
    @endif

    @if(Session::has('updated_employee'))
        <p class="bg-success">{{session('updated_employee')}}</p>
    @endif

    <div class="container">

        <h2 class="bg-primary text-center">List of employees</h2>

        <div class="row">
            <div class="col-md-9">

            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="serach">Search:</label>
                    <input type="text" name="serach" id="serach" class="form-control" />
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th class="sorting text-center" data-sorting_type="asc" data-column_name="id" style="cursor: pointer; vertical-align: middle">ID <span id="id_icon"></span></th>
                    <th class="sorting text-center" data-sorting_type="asc" data-column_name="photo" style="cursor: pointer; vertical-align: middle">Photo <span id="photo_icon"></span></th>
                    <th class="sorting text-center" data-sorting_type="asc" data-column_name="name" style="cursor: pointer; vertical-align: middle">Name <span id="name_icon"></span></th>
                    <th class="sorting text-center" data-sorting_type="asc" data-column_name="position" style="cursor: pointer; vertical-align: middle">Position <span id="position_icon"></span></th>
                    <th class="sorting text-center" data-sorting_type="asc" data-column_name="salary" style="cursor: pointer; vertical-align: middle">Salary <span id="salary_icon"></span></th>
                    <th class="sorting text-center" data-sorting_type="asc" data-column_name="chief" style="cursor: pointer; vertical-align: middle">Chief <span id="chief_icon"></span></th>
                    <th class="sorting text-center" data-sorting_type="asc" data-column_name="employment_date" style="cursor: pointer; vertical-align: middle">Employment Date <span id="employment_date_icon"></span></th>
                    <th class="sorting text-center" data-sorting_type="asc" data-column_name="owner" style="cursor: pointer;vertical-align: middle">Made changes <span id="owner_icon"></span></th>
                </tr>
                </thead>
                <tbody>

                @include('admin.staff.pagination_data')

                {{--@if($staff)--}}
                    {{--@foreach($staff as $employee)--}}
                        {{--<tr>--}}
                            {{--<td>{{$employee->id}}</td>--}}
                            {{--<td>--}}
                                {{--<a href="{{'staff/'. $employee->id . '/edit'}}">--}}
                                    {{--<img height="50" src="{{$employee->photo ? $employee->photo->path : '/images/employee_default.jpg'}}" alt="employee photo">--}}
                                {{--</a>--}}
                            {{--</td>--}}
                            {{--<td><a href="{{'staff/'. $employee->id . '/edit'}}">{{$employee->name}}</a></td>--}}
                            {{--<td>{{$employee->position ? $employee->position->name : 'Non positioned'}}</td>--}}
                            {{--<td>{{$employee->salary}}</td>--}}
                            {{--<td>{{$employee->parent ? $employee->parent->name .' ('. $employee->parent->position->name . ')' : 'Has no chief'}}</td>--}}
                            {{--<td>{{$employee->started_at ? $employee->started_at->format('d.m.Y') : 'No data'}}</td>--}}
                            {{--<td>{{$employee->user ? $employee->user->name : 'Data not assigned'}}</td>--}}
                        {{--</tr>--}}
                    {{--@endforeach--}}
                {{--@endif--}}

                </tbody>
            </table>
            <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
            <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
            <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){

            function clear_icon()
            {
                $('#id_icon').html('');
                $('#photo_icon').html('');
                $('#name_icon').html('');
                $('#position_icon').html('');
                $('#salary_icon').html('');
                $('#chief_icon').html('');
                $('#employment_date_icon').html('');
                $('#owner_icon').html('');
            }

            function fetch_data(page, sort_type, sort_by, query)
            {
                $.ajax({
                    url:"/admin/staff/fetch_data?page="+page+"&sortby="+sort_by+"&sorttype="+sort_type+"&query="+query,
                    success:function(data)
                    {
                        $('tbody').html('');
                        $('tbody').html(data);
                    }
                })
            }

            $(document).on('keyup', '#serach', function(){
                var query = $('#serach').val();
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();
                var page = $('#hidden_page').val();
                fetch_data(page, sort_type, column_name, query);
            });

            $(document).on('click', '.sorting', function(){
                var column_name = $(this).data('column_name');
                var order_type = $(this).data('sorting_type');
                var reverse_order = '';
                if(order_type == 'asc')
                {
                    $(this).data('sorting_type', 'desc');
                    reverse_order = 'desc';
                    clear_icon();
                    $('#'+column_name+'_icon').html('<span class="glyphicon glyphicon-triangle-bottom"></span>');
                }
                if(order_type == 'desc')
                {
                    $(this).data('sorting_type', 'asc');
                    reverse_order = 'asc';
                    clear_icon
                    $('#'+column_name+'_icon').html('<span class="glyphicon glyphicon-triangle-top"></span>');
                }
                $('#hidden_column_name').val(column_name);
                $('#hidden_sort_type').val(reverse_order);
                var page = $('#hidden_page').val();
                var query = $('#serach').val();
                fetch_data(page, reverse_order, column_name, query);
            });

            $(document).on('click', '.pagination a', function(event){
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                $('#hidden_page').val(page);
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();

                var query = $('#serach').val();

                $('li').removeClass('active');
                $(this).parent().addClass('active');
                fetch_data(page, sort_type, column_name, query);
            });

        });
    </script>
@endsection

@section('footer')
@endsection