<?php


namespace Hsy\AnsweringSystem\Http\Controllers;


use Hsy\AnsweringSystem\Models\Call;

class CallController
{
    public function create()
    {
        $call=new Call;
        return view("answering::calls.create",compact("call"));
    }
}