<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ottieni l'ID del ristorante loggato
        $restaurantId = Auth::user()->restaurant->id; // Assumi che restaurant_id sia l'attributo che contiene l'ID del ristorante nell'oggetto User

        // Ottieni gli ordini relativi al ristorante loggato
        $orders = Order::whereHas('products', function ($query) use ($restaurantId) {
            $query->where('restaurant_id', $restaurantId);
        })->orderBy('created_at', 'desc')->get();

        // Restituisci gli ordini alla vista
        return view('admin.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
   
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $products = $order->products()->withPivot('quantity')->get();
        return view('admin.order.show', compact('order','products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
