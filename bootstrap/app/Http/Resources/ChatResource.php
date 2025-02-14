<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'decimal'=>$this->decimal,
            'client_id'=>$this->client_id,
            'worker_id'=>$this->worker_id,
            'send_message'=>$this->receive_message,
            'receive_message'=>$this->send_message,
            'edit_message'=>$this->edit_message,
            'message_status'=>$this->message_status,
            
            // 'date'=>$this->date,

        ];
    }
}
