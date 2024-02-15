<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use Braintree\Gateway;
use Illuminate\Http\Request;



class PaymentController extends Controller
{
    public function generate(Request $request, Gateway $gateway)
    {

        $token = $gateway->clientToken()->generate();

        $data = [
            'token' => $token
        ];

        return response()->json([
            'success' => true,
            'messaggio' => 'Invio Token',
            'data' => $data

        ]);
    }
    public function makePayment(OrderRequest $request, Gateway $gateway)
    {
        $current_order = Order::where('id', $request->orderId)->get();
        
        dd($current_order);

        $result = $gateway->transaction()->sale([
            'amount' => $current_order->total_price,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {

            // Aggiorna il campo payment_status a true
            Order::where('id', $request->orderId)->update(['payment_status' => true]);

            $data = [
                'success' => true,
                'message' => 'Transazione eseguita con Successo!'
            ];

            // $current_order['order_status']

            return response()->json($data, 200);
        } else {
            $data = [
                'success' => false,
                'message' => 'Transazione Fallita!',
            ];

            return response()->json($data, 401);
        }
    }
}
