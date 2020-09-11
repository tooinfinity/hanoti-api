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
            'product_id' => $this->id,
            'product_category' => new CategoryResource($this->category),
            'product_unit' => new UnitResource($this->unit),
            'product_name' => $this->name,
            'product_description' => $this->description,
            'product_image' => $this->image,
            'product_stock' => $this->stock == 0 ? 'Out of stock' : $this->stock,
            'product_purchase_price' => $this->purchase_price,
            'product_sale_price' => $this->sale_price,
        ];
    }
}
