<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = ['FIO', 'status', 'number', 'order_date', 'price', 'comment' , 'product_id'];

    protected $casts = [
        'order_date' => 'datetime',
    ];


    public function product(){
        return $this->belongsTo(Product::class);
    }
}
