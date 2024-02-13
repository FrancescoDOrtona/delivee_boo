<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
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
        for( $i = 0; $i < 10; $i++ ){
            $order = Order::create([
                'customer_name' => $faker->name(),
                'customer_last_name' => $faker->lastName(),
                'customer_email' => $faker->email(),
                'customer_phone' => $faker->phoneNumber(),
                'customer_address' => $faker->address(),
                'payment_status' => $faker->boolean(),
                'total_amount' => 0,
                'order_code' => $faker->unique()->bothify('??##########'),
                'created_at' => $faker->dateTimeThisMonth(),
            ]);
        }

        // Aggiungi prodotti casuali all'ordine
        
        $products = Product::inRandomOrder()->limit(rand(1, 5))->get();
        $totalAmount = 0;
        foreach ($products as $product) {
            $quantity = rand(1, 5);
            $order->products()->attach($product, ['quantity' => $quantity]);
            $totalAmount += $product->price * $quantity;
        }

    }
}
