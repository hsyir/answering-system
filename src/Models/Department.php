<?php


namespace Hsy\AnsweringSystem\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public function ticketSubjects()
    {
        return $this->hasMany(TicketSubject::class);
    }
}