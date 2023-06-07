<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable = [
        'name', 
        'cc', 
        'rut', 
        'address', 
        'phone', 
        'email',
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

}
