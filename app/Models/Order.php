<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table ='order';
    protected $fillable = [
        'user_id',
        'name',
    'lestname',
    'adresse',
    'city',
    'country',
    'codepostal',
    'tele',
    'email',
    'status',
    'message',
    'tracking_no'
];

public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
