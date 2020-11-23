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
            "ticket_subject_id"=>$this->ticket_subject_id,
            "body"=>$this->body,
            "address"=>$this->address,
        ];
    }
}
