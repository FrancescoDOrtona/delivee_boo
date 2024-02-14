<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $restaurants_ids = Restaurant::pluck('id');

        for ($i = 0; $i < 10; $i++) {

            // Recuperiamo l'istanza del ristorante tramite id
            $current_restaurant = Restaurant::find($faker->randomElement($restaurants_ids));

            // Prendo un numero casuale tra gli id dei piatti associati
            $all_products_ids = $current_restaurant->products->pluck('id');
            $rdm_products_ids = $faker->randomElements($all_products_ids, $faker->numberBetween(1, count($all_products_ids)));

            $new_order = new Order([
                'customer_name' => $faker->firstName(),
                'customer_last_name' => $faker->lastName(),
                'customer_email' => $faker->email(),
                'customer_phone' => $faker->e164PhoneNumber(),
                'customer_address' => $faker->address(),
                'payment_status' => $faker->boolean(),
                'total_price' => 0,
                'order_code' => $faker->unique()->bothify('??##########'),
                'created_at' => $faker->dateTimeThisMonth(),
            ]);
            $total = 0;
            $quantities = [];

            foreach ($rdm_products_ids as $product_id) {
                $quantity = $faker->numberBetween(1, 4);
                array_push($quantities, $quantity);
                $total += Product::find($product_id)->price * $quantity;
            }

            $new_order->total_price = $total;
            $new_order->save();

            // dd($new_order);

            if ($new_order->save()) {
                // Esegui attach solo se l'ordine è stato salvato correttamente
                for ($j = 0; $j < count($rdm_products_ids); $j++) {
                    $currProductId = $rdm_products_ids[$j];
                    $currQuantity = $quantities[$j];
                    $new_order->products()->attach($currProductId, ['quantity' => $currQuantity]);
                }
            } else {
                redirect()->back()->with('error', 'Impossibile completare l\'ordine al momento. Si prega di riprovare più tardi.');
            }
        //    sono tiltato 
        }
        // fine ciclo for
    }
}
