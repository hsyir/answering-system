<?php


namespace Hsy\AnsweringSystem\Models;


use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $guarded=[];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function subject()
    {
        return $this->belongsTo(TicketSubject::class,"ticket_subject_id");
    }
}