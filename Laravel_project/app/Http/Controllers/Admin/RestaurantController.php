<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $types = Type::all();
        return view('admin.restaurant.create',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;

        if($request->hasFile('restaurant_image')){
            $img_path = Storage::put('uploads', $request->restaurant_image);

            $data['restaurant_image'] = $img_path;

        }

        if (!isset($data['types']) || empty($data['types'])) {
            return redirect()->back()->withErrors(['types' => 'Seleziona almeno una tipologia di ristorante.']);
        }

        $new_restaurant = Restaurant::create($data);
        $new_restaurant->types()->attach($data['types']);
        return redirect()->route('dashboard', $new_restaurant->id);       
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        $restaurant = Restaurant::findOrFail($restaurant->id);
        return view('admin.restaurant.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
       
        $types = Type::all();
        return view('admin.restaurant.edit',compact('restaurant','types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        $data = $request->validated();

        if ($request->has('restaurant_image')) {
            if ($restaurant->restaurant_image) {
                Storage::delete($restaurant->restaurant_image);
            }
            // Salvo l'immagine
            // e l aggiungo sia all data che poi viene aggiurnato nel databese sia nella cartella public con percorso uploads/image.jpg esempio
            $imagePath = Storage::put('uploads', $request->restaurant_image);
            $data['restaurant_image'] = $imagePath;
        }
        $restaurant->update($data);
        if ($request->has('types')) {
            $restaurant->types()->sync($request->get('types'));
        } else {
            $restaurant->types()->detach();
        }

        return redirect()->route('dashboard', compact('restaurant'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
