<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillables = [
        'name', 'phone', 'address', 'description',
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
