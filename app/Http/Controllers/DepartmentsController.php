<?php

namespace App\Http\Controllers;

use app\Department;
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
        return view('employees::departments.index',compact('departments'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = $this->departments->getAllDepartments();
        $employees = $this->employees->getAllEmployees();
        return view('employees::departments.create',compact('departments','employees'));
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

        $input = $request->except(['manager_id']);
        $department = Department::create($input);
        $manager = $this->employees->find($request->input('manager_id'));
        $manager->managerDepartments()->detach();
        $manager->employeeDepartments()->detach();

        $department->departmentManagers()->attach($manager);
        $department->departmentEmployees()->attach($manager);

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
        $dep = $this->departments->find($id);
        $departments = $this->departments->getAllDepartments();
        $employees = $this->employees->getAllEmployees();
        $managers = $dep->departmentManagers()->get();
        return view('employees::departments.edit',compact('dep','departments','employees','managers'));
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

        $department = $this->departments->find($id);
        $input = $request->except('manager_id');
        $department->update($input);

        $manager = $this->employees->find($request->input('manager_id'));

        $manager->managerDepartments()->detach();
        $manager->employeeDepartments()->detach();
        $department->departmentManagers()->detach();

        $department->departmentManagers()->attach($manager);
        $department->departmentEmployees()->attach($manager);

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
        try {
            $this->departments->find($id)->delete();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors('قبل از حذف بخش باید زیر مجموعه ها تعیین تکلیف شود.');
        }

        return redirect()->route('departments.index')
            ->with('success','بخش با موفقیت حذف شد');
    }
}
