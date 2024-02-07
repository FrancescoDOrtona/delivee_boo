<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


       // Verifica se sono stati forniti tipi per filtrare
    if ($request->has('type_ids')) {
        $typeIds = $request->input('type_ids');
        // Esegui il filtraggio dei ristoranti in base ai tipi forniti
        $restaurants = Restaurant::whereHas('types', function ($query) use ($typeIds) {
            $query->whereIn('type_id', $typeIds);
        })->with('types')->get();
    } else {
        // Se non sono forniti tipi, restituisci tutti i ristoranti
        $restaurants = Restaurant::with('types')->get();
    }
    
    // Ottieni anche tutti i tipi per poterli visualizzare nel frontend
    $types = Type::all();

    return response()->json([
        'results' => [
            'restaurants'=> $restaurants,
            'types' =>  $types
        ],
        'success' => true,
    ]);
    }

    // public function filter(Request $request)
    // {
    //     // Ottieni gli ID dei tipi selezionati dalla richiesta
    //     $typeIds = $request->input('type_ids', []);

    //     // Esegui la query per ottenere i ristoranti filtrati
    //     $restaurants = Restaurant::whereHas('types', function ($query) use ($typeIds) {
    //         $query->whereIn('id', $typeIds);
    //     })->get();

    //     // Restituisci i ristoranti filtrati come risposta JSON
    //     return response()->json(['results' => $restaurants]);
    // }
    
    
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

        $restaurant->load('types','products');

        return response()->json([
            'success'=> true,
            'restaurant'=> $restaurant
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
