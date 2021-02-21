<?php


namespace Hsy\AnsweringSystem\Models;


use Baloot\EloquentHelper;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    use EloquentHelper;
    protected $guarded=[];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function office()
    {
        return $this->belongsTo(Office::class)->withDefault(["name"=>'تعیین نشده']);
    }
    public function city()
    {
        return $this->belongsTo(City::class)->withDefault(["name"=>'تعیین نشده']);
    }
    public function ticketSubject()
    {
        return $this->belongsTo(TicketSubject::class,"ticket_subject_id");
    }

    public function user(){
        return $this->belongsTo(User::class)->withDefault(["name"=>'تعیین نشده']);
    }
    public function creator(){
        return $this->belongsTo(User::class)->withDefault(["name"=>'تعیین نشده']);
    }


    public function isFieldDefined($fieldName){
        return isset($this->ticketSubject->fields[$fieldName]);
    }
}