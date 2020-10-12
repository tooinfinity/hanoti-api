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
            'product_sku' => $this->sku,
            'product_barcode' => $this->barcode,
            'product_description' => $this->description,
            'product_image' => $this->image,
            'product_quantity' => $this->quantity == 0 ? 'Out of quantity' : $this->quantity,
            'product_quantity_alert' => $this->quantity_alert,
            'product_purchase_price' => $this->purchase_price,
            'product_cost_price' => $this->cost_price,
            'product_sell_price' => $this->sell_price,
            'product_status' => $this->status,
        ];
    }
}
