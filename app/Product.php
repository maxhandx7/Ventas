<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


    protected $fillable = [
        'code',
        'name',
        'stock',
        'image',
        'sell_price',
        'status',
        'category_id',
        'provider_id',
    ];

    public function category()
    {
        return $this->belongsTo(category::class);
    }
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
