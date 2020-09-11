<?php

namespace App\Models;

use App\Models\CategoryExpense;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillables = [
        'category_expense_id', 'amount', 'description',
    ];
    public function categoryExpense()
    {
        return $this->belongsTo(CategoryExpense::class);
    }
}
