<?php

namespace Hsy\AnsweringSystem\Http\Controllers;

use Hsy\AnsweringSystem\Http\Resources\DepartmentCollection;
use Hsy\AnsweringSystem\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::withCount("ticketSubjects","tickets")->get();
        return view("answering::departments.all", compact("departments"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = new Department();
        return view("answering::departments.create", compact("department"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ["name" => "required"]);
        $department = $request->isMethod("post") ? new Department() : Department::find($request->department_id);

        $department->name = $request->name;
        $department->save();

        return self::redirectWithSuccess(route("answering.departments.index"),"ثبت شد");

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Hsy\Answering\Models\Department $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        return view("answering::departments.show",compact("department"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Hsy\Answering\Models\Department $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view("answering::departments.edit",compact("department"));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Hsy\Answering\Models\Department $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        //
    }

    public function getDepartments()
    {
        return new DepartmentCollection(Department::all());
    }


    public function addUser(Request $request,Department $department){
        $department->users()->attach([$request->user_id]);
        return self::redirectBackWithSuccess("حله داداش");
    }

    public function removeUser(Request $request,Department $department){
        $department->users()->detach($request->user_id);
        return self::redirectBackWithSuccess("حله داداش");
    }
}
