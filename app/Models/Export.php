<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Export extends Model
{
    //
    protected $fillable = [
        'export_date',
        'customer_id',
        'product_id',
        'country',
        'volume',
        'price',
        'net_profit'
    ];
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);

    }
}
