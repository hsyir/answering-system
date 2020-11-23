<?php


namespace Hsy\AnsweringSystem\Models;


use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        "ticket_subject_id","body","department_id","office_id"
    ];
}