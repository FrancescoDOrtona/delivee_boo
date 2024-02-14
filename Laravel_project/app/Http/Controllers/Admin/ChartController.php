<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index()
    {
        // Recupera i dati per il grafico
        $products = Product::withCount('orders')->get();

        // Passa i dati alla vista
        return view('admin.chart.index', compact('products'));
    }
}
