<?php

namespace Hsy\AnsweringSystem\Http\Controllers;

use Hsy\AnsweringSystem\Http\Resources\CityCollection;
use Hsy\AnsweringSystem\Http\Resources\DepartmentCollection;
use Hsy\AnsweringSystem\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::withCount("offices")->get();
        return view("answering::cities.all", compact("cities"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city = new City();
        return view("answering::cities.create", compact("city"));
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
        $department = $request->isMethod("post") ? new City() : City::find($request->department_id);

        $department->name = $request->name;
        $department->save();

        return self::redirectWithSuccess(route("answering.cities.index"), "ثبت شد");

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Hsy\Answering\Models\City $department
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        return view("answering::cities.show", compact("city"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Hsy\Answering\Models\City $department
     * @return \Illuminate\Http\Response
     */
    public function edit(City $department)
    {
        return view("answering::cities.edit", compact("department"));
    }



    public function getCities()
    {
        return new CityCollection(City::all());
    }
}
