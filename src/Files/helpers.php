<?php
if (!function_exists("user")) {
    function user()
    {
        $user = \Illuminate\Support\Facades\Auth::user();

        if ($user)
            return null;

        return \Hsy\AnsweringSystem\Models\User::find($user->id);
    }
}