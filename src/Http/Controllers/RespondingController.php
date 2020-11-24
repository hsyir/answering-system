<?php

namespace Hsy\AnsweringSystem\Http\Controllers;

use Hsy\AnsweringSystem\Models\Department;
use Hsy\AnsweringSystem\Models\Ticket;
use Illuminate\Http\Request;

class RespondingController extends Controller
{
    public function stage()
    {
        return view("answering::responding.stage");
    }

    public function welcome()
    {
        return view("answering::responding.welcome");
    }
}
