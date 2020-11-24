<?php


namespace Hsy\AnsweringSystem\Models;


use Illuminate\Database\Eloquent\Model;

class TicketSubject extends Model
{
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    protected $casts=[
        "fields"=>"array"
    ];


}