<?php

namespace Hsy\AnsweringSystem\Http\Controllers;

use Hsy\AnsweringSystem\Models\Department;
use Illuminate\Http\Request;

class RespondingController extends Controller
{
    public function stage()
    {
        return view("answering::responding.stage");
    }
}
