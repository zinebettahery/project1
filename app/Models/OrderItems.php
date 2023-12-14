<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class OrderItems extends Model
{
    use HasFactory;
    protected $table ='order_items';
    protected $fillable = [
        'order_id',
        'prod_id',
        'qty',
        'price',
  
];

public function product()
    {
        return $this->belongsTo(Product::class, 'prod_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
  
}
