<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillables = [
        'name', 'phone', 'address', 'description',
    ];

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
