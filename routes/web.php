<?php

use Illuminate\Support\Facades\Route;

Route::get("calls/create", "CallController@create")->name("calls.create");
Route::match(["put", "post"], "calls", "CallController@store")->name("calls.store");

Route::resource("departments", "DepartmentController")->except(["update", "store"]);
Route::match(['PUT', "POST"], "departments", "DepartmentController@store")->name("departments.store");
Route::get("getDepartments", "DepartmentController@getDepartments")->name("getDepartments");
Route::post("departments/{department}/addUser", "DepartmentController@addUser")->name("departments.addUser");
Route::delete("departments/{department}/removeUser", "DepartmentController@removeUser")->name("departments.removeUser");

Route::resource("ticketSubjects", "TicketSubjectController")->except(["update", "store", "create"]);
Route::match(['PUT', "POST"], "ticketSubjects", "TicketSubjectController@store")->name("ticketSubjects.store");
Route::get("ticketSubjects/create/{department?}", "TicketSubjectController@create")->name("ticketSubjects.create");
Route::post("tickets", "TicketController@store")->name("ticket.store");

Route::get("responding/welcome", "RespondingController@welcome")->name("responding.welcome");
Route::get("responding", "RespondingController@stage")->name("responding.stage");
