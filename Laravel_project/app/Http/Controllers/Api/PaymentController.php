<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
    public function makePayment(Request $request, Gateway $gateway)
    {
        $data = 'Tieni da pagà!';

        return response()->json([
            'success' => true,
            'messaggio' => 'Pagina pagamento',
            'data' => $data

        ]);
    }
}
