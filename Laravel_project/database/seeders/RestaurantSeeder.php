<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Restaurant::create([
            'restaurant_name' => 'Ristorante Test',
            'restaurant_description' => 'Sono un Test',
            'restaurant_address' => 'Via del Test',
            'restaurant_image' => 'test.jpg',
            'phone_number' => '320888888',
            'vat_number' => '11111111111',
            'user_id' => 1,            
        ]);
    }
}
