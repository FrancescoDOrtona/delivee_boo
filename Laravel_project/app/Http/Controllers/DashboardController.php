<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        $user = Auth::user();
        if (isset($user->restaurant)) {
            $restaurant = $user->restaurant->toArray();
            return view('dashboard', compact('restaurant'));
        }
        else {
            return view('dashboard');
        }
    }
}
