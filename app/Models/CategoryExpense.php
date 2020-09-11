<?php

namespace App\Models;

use App\Models\Expense;
use Illuminate\Database\Eloquent\Model;

class CategoryExpense extends Model
{
    protected $fillables = [
        'name',
    ];
    
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
