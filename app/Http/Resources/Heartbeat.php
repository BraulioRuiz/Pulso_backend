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
            'pulse' => $this->pulse,
            'status' => $this->status,   
            'date' => $this->date,   
            'id_user'=> $this->id_user,  
            //'data' => $this->data($this->id_user)            
        ];
    }
   
}
