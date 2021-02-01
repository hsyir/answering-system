<?php

namespace Hsy\AnsweringSystem\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Ticket extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id"=>$this->id,
            "ticket_subject"=>new TicketSubject($this->ticketSubject),
            "department"=>new Department($this->department),
            "body"=>$this->body,
            "address"=>$this->address,
            "national_code"=>$this->national_code,
            "mobile_number"=>$this->mobile_number,
            "phone_number"=>$this->phone_number,
            "caller_name"=>$this->caller_name,
            "uuid"=>$this->uuid,
        ];
    }
}
