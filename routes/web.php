<?php

use Illuminate\Support\Facades\Route;

Route::get("calls/create", "CallController@create")->name("calls.create");
Route::match(["put", "post"], "calls", "CallController@store")->name("calls.store");

Route::resource("departments", "DepartmentController")->except(["update", "store"]);
Route::match(['PUT', "POST"], "departments", "DepartmentController@store")->name("departments.store");
Route::get("getDepartments","DepartmentController@getDepartments")->name("getDepartments");

Route::resource("ticketSubjects", "TicketSubjectController")->except(["update", "store"]);
Route::match(['PUT', "POST"], "ticketSubjects", "TicketSubjectController@store")->name("ticketSubjects.store");

Route::get("responding","RespondingController@stage")->name("responding.stage");