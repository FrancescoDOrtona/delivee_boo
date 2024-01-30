<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    // Relazione many to many con restaurants
    public function restaurants(){
        $this->belongsToMany(Restaurant::class);
    }
}
