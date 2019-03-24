<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Heartbeat extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request){
        return [
            'id' => $this->id,            
            'id_user' => $this->id_user,
            'id_pulse' => $this->id_pulse,   
            'date' => $this->date,     
            'data' => $this->data($this->id)            
        ];
    }
   
}
