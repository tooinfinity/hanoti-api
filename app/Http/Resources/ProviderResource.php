<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProviderResource extends JsonResource
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
            'provider_id' => $this->id,
            'provider_name' => $this->name,
            'provider_phone' => $this->phone,
            'provider_address' => $this->address,
            'provider_description' => $this->description,
        ];
    }
}
