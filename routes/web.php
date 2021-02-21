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

//Route::post("tickets", "TicketController@store")->name("ticket.store");
Route::resource("tickets", "TicketController");

Route::get("responding/welcome", "RespondingController@welcome")->name("responding.welcome");
Route::get("responding", "RespondingController@stage")->name("responding.stage");



Route::resource("cities", "CityController")->except(["update", "store"]);
Route::match(['PUT', "POST"], "cities", "CityController@store")->name("cities.store");
Route::post("cities/{city}/addOffice", "CityController@addOffice")->name("cities.addOffice");
Route::get("getCities", "CityController@getCities")->name("getCities");
Route::get("getOffices", "OfficeController@getOffices")->name("getOffices");


Route::get("reports","ReportController@index")->name("reports.index");
Route::get("reports/ticketsReport","ReportController@ticketsReport")->name("reports.ticketsReport");
Route::put("reports/ticketsReport","ReportController@ticketsReport");