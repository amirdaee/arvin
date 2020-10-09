<?php

namespace App\Http\Controllers;

use App\Department;
use App\User;
use Illuminate\Http\Request;


class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $departments = Department::orderBy('id','DESC')->paginate(5);
        return view('departments.index',compact('departments'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::get();
        $users = User::get();
        return view('departments.create',compact('departments','users'));
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
            'name' => 'required',
            'manager_id' => 'required',
        ]);
        $department = Department::create($request->all());
        return redirect()->route('departments.index')
            ->with('success','بخش جدید با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = $this->departments->find($id);
        $childs = $this->departments->getChild($id);
        $employees = $this->employees->getAllEmployees();
        return view('employees::departments.show',compact('department','childs','employees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dep = Department::withDepth()->find($id);
        $departments = Department::get();
        $users = User::get();
        $manager = $dep->manager()->first();
        dd($dep->depth);
        return view('departments.edit',compact('dep','departments','users','manager'));
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
            'name' => 'required',
        ]);

        $department = Department::find($id);
        $department->update($request->all());

        return redirect()->route('departments.index')
            ->with('success','بخش با موفقیت به روز شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        if(!$department->isRoot()){
            if ($department->users()->count() == 0){
                Department::find($id)->delete();
                return redirect()->route('departments.index')
                    ->with('success','بخش با موفقیت حذف شد');
            }
            else{
                return redirect()->back()
                    ->withErrors('بخش مورد نظر به دلیل داشتن کارمند قابل حذف نیست.');
            }
        }
        else{
            return redirect()->back()
                ->withErrors('بخش مورد نظر قابل حذف نیست.');
        }
    }
}
