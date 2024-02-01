<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Dati dei piatti
         $products = [
            [
                'name' => 'Spaghetti alla Carbonara',
                'description' => 'Deliziosi spaghetti con uovo, pancetta e pecorino romano.',
                'price' => 12.50,
                'available' => true,
                'image' => 'spaghetti_carbonara.jpg',
                'restaurant_id' => 1
            ],
            [
                'name' => 'Pizza Margherita',
                'description' => 'Classica pizza con pomodoro, mozzarella e basilico.',
                'price' => 9.99,
                'available' => true,
                'image' => 'pizza_margherita.jpg',
                'restaurant_id' => 1
            ],
            [
                'name' => 'Filetto di Salmone',
                'description' => 'Salmone fresco grigliato servito con contorno di verdure.',
                'price' => 15.75,
                'available' => true,
                'image' => 'filetto_salmone.jpg',
                'restaurant_id' => 1
            ],
            [
                'name' => 'Insalata Caprese',
                'description' => 'Insalata fresca con pomodoro, mozzarella di bufala, basilico e olio extravergine di oliva.',
                'price' => 8.50,
                'available' => false,
                'image' => 'insalata_caprese.jpg',
                'restaurant_id' => 1
            ],
            [
                'name' => 'Lasagne al Forno',
                'description' => 'Strati di pasta, besciamella, ragù e formaggio, cotti al forno.',
                'price' => 11.99,
                'available' => true,
                'image' => 'lasagne.jpg',
                'restaurant_id' => 1
            ],
            [
                'name' => 'Hamburger con Patatine',
                'description' => 'Hamburger di manzo con insalata, pomodoro e formaggio, servito con patatine fritte.',
                'price' => 13.25,
                'available' => true,
                'image' => 'hamburger_patatine.jpg',
                'restaurant_id' => 1
            ],
            [
                'name' => 'Tiramisù',
                'description' => 'Dolce italiano fatto con savoiardi, caffè, mascarpone e cacao.',
                'price' => 6.99,
                'available' => false,
                'image' => 'tiramisu.jpg',
                'restaurant_id' => 1
            ],
            [
                'name' => 'Insalata di Pollo',
                'description' => 'Insalata mista con petto di pollo grigliato, pomodoro, cetrioli e mais.',
                'price' => 10.50,
                'available' => true,
                'image' => 'insalata_pollo.jpg',
                'restaurant_id' => 1
            ],
            [
                'name' => 'Risotto ai Funghi',
                'description' => 'Risotto cremoso con funghi porcini freschi e parmigiano.',
                'price' => 14.50,
                'available' => false,
                'image' => 'risotto_funghi.jpg',
                'restaurant_id' => 1
            ],
            [
                'name' => 'Gelato alla Vaniglia',
                'description' => 'Gelato cremoso alla vaniglia, servito con scaglie di cioccolato.',
                'price' => 5.75,
                'available' => true,
                'image' => 'gelato_vaniglia.jpg',
                'restaurant_id' => 1
            ],
        ];

        // Popola il database con i piatti
        foreach ($products as $product) {
            Product::create([
                'name' => $product['name'],
                'description' => $product['description'],
                'price' => $product['price'],
                'available' => $product['available'],
                'image' => $product['image'],
                'restaurant_id' => $product['restaurant_id']
            ]);
        }
    }
}
