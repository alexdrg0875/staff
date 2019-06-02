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
use function Sodium\library_version_major;

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
        $maxHierarchyNum = Position::pluck('id')->last();
        $chiefs = Staff::where('position_id', '<', $maxHierarchyNum)->pluck('name', 'id')->all();
        return view('admin.staff.create', compact('positions', 'chiefs', 'maxHierarchyNum'));
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
        $chiefs = Staff::where('position_id', '<', $employee->position_id)->orderBy('position_id')->pluck('name', 'id')->all();
        $positions = Position::pluck('name', 'id')->all();
        return view('admin.staff.edit', compact('employee','positions', 'chiefs'));
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

        Session::flash('updated_employee', 'The employee has been updated');

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

    public static function htmlTreeBuilder($array){
        echo '<ul class = "treeCSS">';
        foreach ($array as $row){
            echo '<li>';
            echo $row->name . ' (<b>' . $row->position->name . "</b> / <b>Employment date: </b>" . $row->started_at->format('d.m.Y') . '<b> / Salary: </b>' . $row->salary . ")" ;
            if($row->children){
                self::htmlTreeBuilder($row->children);
            }
            echo '</li>';
        }
        echo '</ul>';
    }
}
