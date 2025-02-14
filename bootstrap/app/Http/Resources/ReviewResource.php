<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
            'description'=>$this->description,
            
            'status'=>$this->status,
            'price'=>$this->price,
            'client_id'=>$this->client_id,
            'worker_id'=>$this->worker_id,
         
            
        ];
    }
}
