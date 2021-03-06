<?php

namespace App\Http\Controllers;

use App\Department;
use App\Project;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(20);
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('display_name','id');
        $departments = Department::get();
        $projects = Project::get();
        return view('users.create',compact('roles','departments','projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|unique:users',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($request->password);
        $user = User::create($input);
        $user->roles()->sync($request->input('roles'));
        $user->projects()->sync($request->input('projects'));

        return redirect()->route('users.index')
            ->with('success','کاربر جدید با موفقیت ثبت شد');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('display_name','id');
        $projects = Project::get();
        $userRole = $user->roles->pluck('id','id')->toArray();
        $userProject = $user->projects->pluck('id','id')->toArray();
        $departments = Department::get();
        return view('users.edit',compact('user','roles','userRole','departments','projects','userProject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:users,name,'.$id,
            'email'=>'required|unique:users,email,'.$id,
            'first_name' => 'required',
            'last_name' => 'required',
            'roles' => 'required'
        ]);

        $input = $request->all();

        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        $user->roles()->sync($request->roles);
        $user->projects()->sync($request->input('projects'));

        return redirect()->route('users.index')
            ->with('success','کار با موفقیت به روز شد');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->back()
            ->with('success','کاربر با موفقیت حذف شد');
    }
}
