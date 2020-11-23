<?php

namespace Hsy\AnsweringSystem\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketSubject extends JsonResource
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
            "title"=>$this->title,
            "description"=>$this->description,
            "priority"=>$this->priority,
            "fields"=>$this->fields,
        ];
    }
}
