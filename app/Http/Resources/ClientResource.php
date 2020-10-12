<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'client_id' => $this->id,
            'client_type' => $this->client_type,
            'client_name' => $this->name,
            'client_phone' => $this->phone,
            'client_address' => $this->address,
            'client_description' => $this->description,
        ];
    }
}
