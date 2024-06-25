<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'cc',
        'image',
        'address',
        'email',
        'phone',
        'rut',
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
