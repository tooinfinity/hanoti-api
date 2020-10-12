<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillables = [
        'client_type', 'name', 'phone', 'address', 'description',
    ];
}
