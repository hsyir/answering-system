<?php


namespace Hsy\AnsweringSystem\Models;


use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    public function callInfo()
    {
        return $this->hasOne(CallerInfo::class);
    }
}