<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'customer_last_name',
        'customer_email',
        'customer_phone',
        'customer_address',
        'payment_status',
        'total_price',
        'order_code',
        'created_at',
    ];

    // Relazione many to many con Products
    public function products()
    {
        $this->belongsToMany(Product::class)->withPivot('quantity');
    }
}
