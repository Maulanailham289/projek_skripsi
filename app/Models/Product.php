<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable =[
        'name',
        'category',
        'price',
    ];
    public function exports(){
        return $this->hasMany(Export::class);
    }
}
