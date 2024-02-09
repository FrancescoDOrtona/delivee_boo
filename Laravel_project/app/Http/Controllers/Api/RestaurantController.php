<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('types')) {
            $types = explode(',', $request->types);
            $restaurants = Restaurant::whereHas('types', function ($query) use ($types) {
                // Filtra solo i ristoranti che hanno tutti i tipi forniti
                $query->whereIn('type_id', $types);
            }, '=', count($types))->with('types')->get();
        } else {
            // Se non sono forniti tipi, restituisci tutti i ristoranti
            $restaurants = Restaurant::with('types')->get();
        }

        // Ottieni anche tutti i tipi per poterli visualizzare nel frontend
        $types = Type::all();

        return response()->json([
            // 'request'=> explode(',', $request->types),
            'results' => [
                'restaurants' => $restaurants,
                'types' => $types
            ],
            'success' => true,
            // 'query' =>$query 
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {

        $restaurant->load('types', 'products');

        return response()->json([
            'success' => true,
            'restaurant' => $restaurant
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
