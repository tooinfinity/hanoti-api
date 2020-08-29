<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillables = [
        'name'
    ];

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
