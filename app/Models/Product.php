<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillables = [
        'name', 'description', 'image', 'quantity', 'quantity_alert',
        'sell_price', 'purchase_price', 'category_id',
        'unit_id', 'status'
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function transactions(){
        return $this->belongsToMany(Transaction::class);
    }
}
