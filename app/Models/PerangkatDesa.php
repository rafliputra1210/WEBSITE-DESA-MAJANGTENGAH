<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerangkatDesa extends Model
{
    protected $fillable = [
        'name',
        'position',
        'photo',
        'order_number',
    ];
}
