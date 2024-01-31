<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'restaurant_name',
        'restaurant_description',
        'restaurant_address',
        'restaurant_image',
        'phone_number',
        'vat_number',
        'type_id',
        'user_id'
    ];
    // Relazione 1 to 1 con User
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Relazione many to many con Type
    public function types(){
        return $this->belongsToMany(Type::class);
    }

    // Relazione 1 to many con Product
    public function products(){
        return $this->hasMany(Product::class);
    }
}
