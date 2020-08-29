<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'id' => $this->id,
            'category' => $this->category,
            'unit' => $this->unit,
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->image,
            'stock' => $this->stock == 0 ? 'Out of stock' : $this->stock,
            'purchase_price' => $this->purchase_price,
            'sale_price' => $this->sale_price,
        ];
    }
}
