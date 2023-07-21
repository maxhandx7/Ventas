<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Subcategory extends Model
{

    protected $fillable = [
        'name', 'description', 'slug', 'category_id',
    ];

    public function my_store($request){
        self::create([
            'name'=> $request->name,
            'description'=> $request->description,
            'slug' => Str::slug($request->name, '_'),
            'category_type' => $request->category_id,
        ]);
    }

    public function my_update($request){
        $this->update([
            'name'=> $request->name,
            'description'=> $request->description,
            'slug' => Str::slug($request->name, '_'),
            'category_type' => $request->category_id,
        ]);
    }
}
