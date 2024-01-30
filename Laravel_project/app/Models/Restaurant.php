<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    // Relazione 1 to 1 con User
    public function user(){
        return $this->belongsTo(User::class);
    }
}
