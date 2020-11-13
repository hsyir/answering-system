<?php


namespace Hsy\AnsweringSystem\Models;


use Illuminate\Database\Eloquent\Model;

class CallerInfo extends Model
{
    public function call()
    {
        return $this->belongsTo(Call::class);
    }
}
