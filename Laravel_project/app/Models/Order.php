<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Relazione many to many con Products
    public function products(){
        $this->belongsToMany(Product::class);
    }
}
