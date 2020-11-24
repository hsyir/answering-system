<?php

namespace Hsy\AnsweringSystem\Http\Controllers;

use Hsy\AnsweringSystem\Http\Resources\Ticket as TicketResource;
use Hsy\AnsweringSystem\Models\Ticket;
use Hsy\AnsweringSystem\Models\TicketSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $data["uuid"]=Str::random(16);
        $ticket = Ticket::create($data);
        return new TicketResource($ticket);
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
        return view("answering::ticketSubjects.edit", compact("ticketSubject"));
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
