<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'customer_id' => $this->id,
            'customer_name' => $this->name,
            'customer_phone' => $this->phone,
            'customer_address' => $this->address,
            'customer_description' => $this->description,
        ];
    }
}
