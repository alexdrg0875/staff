<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffRequest;
use App\Photo;
use App\Position;
use App\Role;
use App\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::all();

        return view('admin.staff.index', compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Position::pluck('name', 'id')->all();
        return view('admin.staff.create', compact('positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StaffRequest $request)
    {
        $input = $request->all();

        $user = Auth::user();
        $input['user_id'] = $user->id;

        if($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);   // save in public\images
            $photo = Photo::create(['path' => $name]);
            $input['photo_id'] = $photo->id;
        }

        Staff::create($input);

        return redirect('/admin/staff');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Staff::findOrFail($id);
        $positions = Position::pluck('name', 'id')->all();
        return view('admin.staff.edit', compact('employee','positions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StaffRequest $request, $id)
    {
        $employee = Staff::findOrFail($id);
        $input = $request->all();

        $user = Auth::user();
        $input['user_id'] = $user->id;

        if($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);   // save in public\images
            $photo = Photo::create(['path' => $name]);
            $input['photo_id'] = $photo->id;
        }

        $employee->update($input);

        return redirect('/admin/staff');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Staff::findOrFail($id);
        if($employee->photo_id){                                        //preventing to delete default avatar photo
            unlink(public_path() . $employee->photo->path);    //adding to delete user photo in /images folder
        }
        $employee->delete();
        Session::flash('deleted_employee', 'The employee has been deleted');    // add putting information after deleting user
        return redirect('/admin/staff');
    }
}
