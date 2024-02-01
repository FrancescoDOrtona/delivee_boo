<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    // Recupera l'ID del ristorante corrente associato all'utente loggato
    $restaurantId = auth()->user()->restaurant->id;

    // Recupera solo i prodotti del ristorante corrente
    $products = Product::where('restaurant_id', $restaurantId)->get();


        return view("admin.product.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view("admin.product.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $restaurantId = auth()->user()->restaurant->id;
        $data['restaurant_id'] =  $restaurantId;


        if ($request->hasFile('image')) {
            $img_path = Storage::put('uploads', $request->image);

            $data['image'] = $img_path;
        }

        $product = Product::create($data);



        return redirect()->route('admin.product.show', $product->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        if ($request->has('image')) {
            if ($product->image) {
                Storage::delete($product->image);
            }
            // Salvo l'immagine
            // e l aggiungo sia all data che poi viene aggiurnato nel databese sia nella cartella public con percorso uploads/image.jpg esempio
            $imagePath = Storage::put('uploads', $request->image);
            $data['image'] = $imagePath;
        }
        $product->update($data);

        return redirect()->route('admin.product.show', compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete($product->image);
        }
        $product->delete();

        return redirect()->route('admin.product.index');
    }
}
