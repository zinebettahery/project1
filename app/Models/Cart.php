<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table ='carts';
    protected $fillabe =[
        'prod_id',
        'user_id',
        'prod_quantity'
    ];
    // Modèle Cart.php
public function product()
{
    return $this->belongsTo(Product::class, 'prod_id');
}
public static function getContent()
{
    return self::where('user_id', auth()->id())->get();
}


}
