<?php

use Illuminate\Support\Facades\Route;

Route::get("calls/create","CallController@create")->name("calls.create");
Route::match(["put","post"],"calls","CallController@store")->name("calls.store");
