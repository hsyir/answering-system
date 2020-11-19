<?php


namespace Hsy\AnsweringSystem\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected static function redirectWithSuccess($redirectTo, $message)
    {
        return redirect($redirectTo)->with('success', $message);
    }
    protected static function redirectBackWithSuccess($message)
    {
        return redirect()->back()->with('success', $message);
    }
    protected static function redirectWithError($redirectTo, $message)
    {
        return redirect($redirectTo)->with('errors', collect([$message]));
    }
    protected static function redirectBackWithError($message)
    {
        return redirect()->back()->with('errors', collect([$message]))->withInput();
    }
}