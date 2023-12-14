<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'detail','price','quantity','category_id', 'image','prixpromo','promo','duree'
    ];
    
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function Cart()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
