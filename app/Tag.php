<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; 

class Tag extends Model
{
    protected $fillable = [
        'name', 'description', 'slug',
    ];

    public function products(){
        return $this->belongsToMany(Product::class);
    }


    public function my_store($request){
        self::create([
            'name'=> $request->name,
            'description'=> $request->description,
            'slug' => Str::slug($request->name, '_')
        ]);
    }

    public function my_update($request){
        $this->update([
            'name'=> $request->name,
            'description'=> $request->description,
            'slug' => Str::slug($request->name, '_')
        ]);
    
}


}