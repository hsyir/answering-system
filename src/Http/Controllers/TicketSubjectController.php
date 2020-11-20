<?php

namespace Hsy\AnsweringSystem\Http\Controllers;

use Hsy\AnsweringSystem\Models\TicketSubject;
use Illuminate\Http\Request;

class TicketSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticketSubjects = TicketSubject::with("department")->get();
        return view("answering::ticketSubjects.all", compact("ticketSubjects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ticketSubject = new TicketSubject();
        return view("answering::ticketSubjects.create", compact("ticketSubject"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                "title" => "required",
                "department_id" => "required|exists:departments,id",
            ]
        );

        $ticketSubject = $request->isMethod("post") ? new TicketSubject() : TicketSubject::find($request->ticketSubject_id);

        $ticketSubject->title = $request->title;
        $ticketSubject->department_id = $request->department_id;
        $ticketSubject->description = $request->description;
        $ticketSubject->priority = $request->priority;
        $ticketSubject->fields = $request->fields;

        $ticketSubject->save();

        return self::redirectWithSuccess(route("answering.ticketSubjects.index"),"ثبت شد");

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Hsy\Answering\Models\TicketSubject $ticketSubject
     * @return \Illuminate\Http\Response
     */
    public function show(TicketSubject $ticketSubject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Hsy\Answering\Models\TicketSubject $ticketSubject
     * @return \Illuminate\Http\Response
     */
    public function edit(TicketSubject $ticketSubject)
    {
        return view("answering::ticketSubjects.edit",compact("ticketSubject"));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Hsy\Answering\Models\TicketSubject $ticketSubject
     * @return \Illuminate\Http\Response
     */
    public function destroy(TicketSubject $ticketSubject)
    {
        //
    }
}
