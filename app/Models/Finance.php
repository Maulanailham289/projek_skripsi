<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    //
    protected $fillable =[
        'export_id',
        'cost',
        'income',
        'efficiency'
    ];

    public function exports(){
        return $this->belongsTo(Export::class);
    }
}
