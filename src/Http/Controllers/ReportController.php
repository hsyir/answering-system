<?php

namespace Hsy\AnsweringSystem\Http\Controllers;

use Hsy\AnsweringSystem\Http\Resources\CityCollection;
use Hsy\AnsweringSystem\Http\Resources\DepartmentCollection;
use Hsy\AnsweringSystem\Models\City;
use Hsy\AnsweringSystem\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        return view("answering::reports.index");
    }

    public function ticketsReport(Request $request)
    {
        $tickets = Ticket::select(DB::raw("tickets.*,departments.name as department_name,ticket_subjects.title as subject_title"))
            ->when($request->department_id, function ($q) use ($request) {
                $q->where("tickets.department_id",$request->department_id);
            })
            ->when($request->ticket_subject_id, function ($q) use ($request) {
                $q->whereTicketSubjectId($request->ticket_subject_id);
            })
            ->when($request->from_date, function ($q) use ($request) {
                $q->whereJalali("tickets.created_at", ">=", $request->from_date);
            })
            ->when($request->to_date, function ($q) use ($request) {
                $q->whereJalali("tickets.created_at", "<=", $request->to_date);
            })
            ->latest()
            ->join("departments","departments.id","tickets.department_id")
            ->join("ticket_subjects","ticket_subjects.id","tickets.ticket_subject_id")
            ->paginate(100);

        return view("answering::reports.ticketsReport", compact("tickets"));

    }
}
