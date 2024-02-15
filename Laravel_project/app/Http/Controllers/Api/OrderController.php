<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Product;
use Faker\Generator as Faker;

class OrderController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request,  Faker $faker)
    {
    
    // Esegui la logica per gestire i dati del cliente e del carrello
    // Estrai i dati JSON dal corpo della richiesta
    $requestData = $request->json()->all();
        // dd($requestData);
    // Estrai il cliente e il carrello dai dati della richiesta
    $customer = $requestData['customer'];
    $cart = $requestData['cart'];

    

    //recuperiamo gli ids dei prodotti dal carrello
    $productIds = [];
    foreach($cart as $item){
        $productIds[] = $item['product_id'];
    }
    
    $products = Product::whereIn('id',$productIds)->get();
    // calcola il totale dei prodotti

    $totalAmount = 0;
    foreach($cart as $item){
        foreach($products as $product){
            if($item['product_id'] == $product->id){
                $totalAmount += $product->price * $item['quantity'];
                break;
            }
        }
    }

    // Assegniamo il totale alla colonna total_price del DB
    $order = new Order();
    $order->customer_name = $customer['name'];
    $order->customer_last_name = $customer['last_name'];
    $order->customer_email = $customer['email'];
    $order->customer_phone = $customer['phone_number'];
    $order->customer_address = $customer['address'];
    $order->payment_status = false;
    $order->order_code =  $faker->unique()->bothify('??##########');
    $order->total_price = $totalAmount;
    $order->save();

    if ($order->save()) {
        // Esegui attach solo se l'ordine è stato salvato correttamente
        foreach ($productIds as $productId) {
            $current_quantity = 0;
            foreach ($cart as $item) {
                if ($item['product_id'] == $productId) {
                    $current_quantity = $item['quantity'];
                    break; // Esci dal loop una volta trovato il prodotto nel carrello
                }
            }
            $order->products()->attach($productId, ['quantity' => $current_quantity]);
        }
    } else {
        return response()->json([
            'success' => false,
            'messaggio' => 'Impossibile completare l\'ordine al momento. Si prega di riprovare più tardi.',
        ]);
    }

    // return redirect()->route('makePayment.make', ['totalAmount' => $totalAmount,'customer'=> $customer]);
    return response()->json([
        'success' => true,
        'messaggio' => 'Dati del cliente e del carrello ricevuti e gestiti con successo',
        'total'=> $totalAmount,
        'customer'=> $customer,
        'cart' => $cart,
        'orderId' => $order->id,
       
    ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
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
