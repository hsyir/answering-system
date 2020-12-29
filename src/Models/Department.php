<?php


namespace Hsy\AnsweringSystem\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public function ticketSubjects()
    {
        return $this->hasMany(TicketSubject::class,"department_id");
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}