<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    protected $fillable = [
        'iso',
        'shipping_price',
        'tax',
    ];
}
