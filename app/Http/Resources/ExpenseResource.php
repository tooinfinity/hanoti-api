<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExpenseResource extends JsonResource
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
            'expense_id' => $this->id,
            'expense_category' => new ExpenseCategoryResource($this->categoryExpense),
            'expense_amount' => $this->amount,
            'expense_description' => $this->description,
        ];
    }
}
