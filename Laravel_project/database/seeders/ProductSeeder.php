<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fileName = 'pizza_margherita.jpg'; // il nome del file dell'immagine che desideri inserire
        $filePath = 'public/images/uploads/' . $fileName; // il percorso relativo al file

        // Copia l'immagine dalla sua posizione originale nella cartella di memorizzazione di Laravel
        Storage::copy('public/storage/uploads' . $fileName, $filePath);

        // Dati dei piatti
        $products = [
            [
                'name' => 'Spaghetti alla Carbonara',
                'description' => 'Deliziosi spaghetti con uovo, pancetta e pecorino romano.',
                'price' => 12.50,
                'available' => true,
                'image' => 'uploads/pizza_margherita.jpg',
                'restaurant_id' => 1
            ],
            [
                'name' => 'Pizza Margherita',
                'description' => 'Classica pizza con pomodoro, mozzarella e basilico.',
                'price' => 9.99,
                'available' => true,
                'image' => 'uploads/pizza_margherita.jpg',
                'restaurant_id' => 1
            ],
            [
                'name' => 'Filetto di Salmone',
                'description' => 'Salmone fresco grigliato servito con contorno di verdure.',
                'price' => 15.75,
                'available' => true,
                'image' => 'uploads/pizza_margherita.jpg',
                'restaurant_id' => 1
            ],
            [
                'name' => 'Insalata Caprese',
                'description' => 'Insalata fresca con pomodoro, mozzarella di bufala, basilico e olio extravergine di oliva.',
                'price' => 8.50,
                'available' => false,
                'image' => 'uploads/pizza_margherita.jpg',
                'restaurant_id' => 1
            ],
            [
                'name' => 'Lasagne al Forno',
                'description' => 'Strati di pasta, besciamella, ragù e formaggio, cotti al forno.',
                'price' => 11.99,
                'available' => true,
                'image' => 'uploads/pizza_margherita.jpg',
                'restaurant_id' => 1
            ],
            [
                'name' => 'Hamburger con Patatine',
                'description' => 'Hamburger di manzo con insalata, pomodoro e formaggio, servito con patatine fritte.',
                'price' => 13.25,
                'available' => true,
                'image' => 'uploads/pizza_margherita.jpg',
                'restaurant_id' => 1
            ],
            [
                'name' => 'Tiramisù',
                'description' => 'Dolce italiano fatto con savoiardi, caffè, mascarpone e cacao.',
                'price' => 6.99,
                'available' => false,
                'image' => 'uploads/pizza_margherita.jpg',
                'restaurant_id' => 1
            ],
            [
                'name' => 'Insalata di Pollo',
                'description' => 'Insalata mista con petto di pollo grigliato, pomodoro, cetrioli e mais.',
                'price' => 10.50,
                'available' => true,
                'image' => 'uploads/pizza_margherita.jpg',
                'restaurant_id' => 1
            ],
            [
                'name' => 'Risotto ai Funghi',
                'description' => 'Risotto cremoso con funghi porcini freschi e parmigiano.',
                'price' => 14.50,
                'available' => false,
                'image' => 'uploads/pizza_margherita.jpg',
                'restaurant_id' => 1
            ],
            [
                'name' => 'Gelato alla Vaniglia',
                'description' => 'Gelato cremoso alla vaniglia, servito con scaglie di cioccolato.',
                'price' => 5.75,
                'available' => true,
                'image' => 'uploads/pizza_margherita.jpg',
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
