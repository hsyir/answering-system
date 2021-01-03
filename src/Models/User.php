<?php


namespace Hsy\AnsweringSystem\Models;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function departments()
    {
        return $this->belongsToMany(Department::class);
    }
}