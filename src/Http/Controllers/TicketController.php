<?php

namespace Hsy\AnsweringSystem\Http\Controllers;

use Hsy\AnsweringSystem\Http\Resources\Ticket as TicketResource;
use Hsy\AnsweringSystem\Models\Ticket;
use Hsy\AnsweringSystem\Models\TicketSubject;
use Hsy\AnsweringSystem\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $departments = $this->user()->departments()->get()->pluck("id");
        $tickets = Ticket::whereIn("department_id", $departments)->with("department", "ticketSubject")->get();
        return view("answering::tickets.all", compact("tickets"));
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

        $this->validate($request, [
            "mobile_number" => "sometimes|nullable|iran_mobile",
            "national_code" => "sometimes|nullable|iran_national_code",
        ]);

        $data = $request->all();
        $data["creator_id"] = Auth::user() ? Auth::user()->id : null ;
        $data["uuid"] = Str::random(16);
        $ticket = Ticket::create($data);
        return new TicketResource($ticket);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Hsy\Answering\Models\TicketSubject $ticketSubject
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return view("answering::tickets.show",compact("ticket"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Hsy\Answering\Models\TicketSubject $ticketSubject
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        return view("answering::ticketSubjects.edit", compact("ticket"));
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


    function user()
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        if (!$user)
            return null;

        return \Hsy\AnsweringSystem\Models\User::find($user->id);
    }
}
