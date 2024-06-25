<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Currency extends Model
{
    protected $primaryKey = 'iso';
    public $incrementing = false;
    protected $fillable = [
        'iso',
    ];
}
