<?php


namespace Hsy\AnsweringSystem\Models;


use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function offices()
    {
        return $this->hasMany(Office::class);
    }
}