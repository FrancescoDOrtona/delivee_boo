<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Relazione 1 to many con Restaurant
    public function restaurant(){
        $this->belongsTo(Restaurant::class);
    }

    // Relazione many to many con Orders
    public function orders(){
        $this->belongsToMany(Order::class);
    }
}
