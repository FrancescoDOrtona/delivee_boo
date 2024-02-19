<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $restaurant = Restaurant::create([
        //     'restaurant_name' => 'Ristorante Test',
        //     'restaurant_description' => 'Sono un Test',
        //     'restaurant_address' => 'Via del Test',
        //     'restaurant_image' => 'test.jpg',
        //     'phone_number' => '320888888',
        //     'vat_number' => '11111111111',
        //     'user_id' => 1,

        // ]);
        // $types = Type::whereIn('id', [1, 3, 5])->get();

        // $restaurant->types()->attach($types);

        // $types = Type::all();
        $types = [
            'Il Ristorante' => [11],
            'Burger King' => [5],
            'Antico Vinaio' => [7, 10],
            'Sushi Zanmai' => [2, 11],
            'Alibabá' => [3],
            'Pizzeria Napoli' => [1, 11],
            'Iginio Massari' => [8],
            'Currymania' => [4,11],
            'Old Wild West' => [6],
            'Polo Nord' => [9, 12],
            'Ruspantino' => [10],
            'Mc Donald\'s' => [5],

        ];
        $restaurants = [
            [
                'restaurant_name' => 'Il Ristorante',
                'restaurant_description' => 'Un ristorante classico offre un\'elegante atmosfera e un menu raffinato che celebra le tradizioni culinarie con piatti iconici e un servizio impeccabile. Ogni visita è un\'esperienza di gusto senza tempo, dove la qualità e l\'ospitalità sono sempre al primo posto.',
                'restaurant_address' => 'Via Portanza 15',
                'restaurant_image' => '',
                'phone_number' => '0280032393',
                'vat_number' => '11111111133',
                'user_id' => 1,
            ],
            [
                'restaurant_name' => 'Burger King',
                'restaurant_description' => 'Entra e scopri tutti i menu, gli hamburger, gli snack Burger King® e le promozioni che abbiamo pensato per te.',
                'restaurant_address' => 'Via Tibaldi 11',
                'restaurant_image' => '',
                'phone_number' => '0280012397',
                'vat_number' => '11111111112',
                'user_id' => 2,
            ],
            [
                'restaurant_name' => 'Antico Vinaio',
                'restaurant_description' => 'Bada a come la fuma',
                'restaurant_address' => 'Via lupetta 12',
                'restaurant_image' => '',
                'phone_number' => '0280012398',
                'vat_number' => '11111111113',
                'user_id' => 3,
            ],
            [
                'restaurant_name' => 'Sushi Zanmai',
                'restaurant_description' => 'Locale a conduzione familiare, il ristorante Sushi Zanmai è il luogo perfetto per una pausa pranzo leggera, per una cena in compagnia di amici o con la famiglia.',
                'restaurant_address' => 'Via del Nippon',
                'restaurant_image' => '',
                'phone_number' => '0280012544',
                'vat_number' => '11111111114',
                'user_id' => 4,
            ],
            [
                'restaurant_name' => 'Alibabá',
                'restaurant_description' => 'IL RISTORANTE PERFETTO PER IL TUO PRANZO O CENA TIPICA "TURKISH"',
                'restaurant_address' => 'Via Roma 42',
                'restaurant_image' => '',
                'phone_number' => '0280012123',
                'vat_number' => '11111111122',
                'user_id' => 5,
            ],
            [
                'restaurant_name' => 'Pizzeria Napoli',
                'restaurant_description' => 'Scoprire sapori dimenticati grazie alla scelta di ingredienti Italiani di stagione di qualità e provenienza rigorosamente controllata.',
                'restaurant_address' => 'Via Torino 70',
                'restaurant_image' => '',
                'phone_number' => '0280012789',
                'vat_number' => '11111111115',
                'user_id' => 6,
            ],
            [
                'restaurant_name' => 'Iginio Massari',
                'restaurant_description' => 'Una pasticceria d\'élite offre creazioni artigianali raffinate e deliziose, con una fusione di sapori e presentazioni impeccabili, trasformando dolci in vere opere d\'arte gustative.',
                'restaurant_address' => 'Via Tibaldi 56',
                'restaurant_image' => '',
                'phone_number' => '0280012346',
                'vat_number' => '11111111116',
                'user_id' => 7,
            ],
            [
                'restaurant_name' => 'Currymania',
                'restaurant_description' => 'Un ristorante indiano autentico cattura l\'essenza delle spezie e dei sapori vibranti della cucina dell\'India, offrendo piatti tradizionali e innovativi in un\'atmosfera accogliente e ricca di colori, dove ogni boccone è un viaggio sensoriale.',
                'restaurant_address' => 'Via lupetta 15',
                'restaurant_image' => '',
                'phone_number' => '0280012785',
                'vat_number' => '11111111117',
                'user_id' => 8,
            ],
            [
                'restaurant_name' => 'Old Wild West',
                'restaurant_description' => '
                Un pub accogliente e vivace, dove l\'atmosfera frizzante si mescola con la calda ospitalità. Offre una vasta selezione di birre artigianali e cibi da pub classici, invitando gli avventori a rilassarsi e godersi buona compagnia e divertimento.',
                'restaurant_address' => 'Via Porta Fiume 24',
                'restaurant_image' => '',
                'phone_number' => '0280012354',
                'vat_number' => '11111111118',
                'user_id' => 9,
            ],
            [
                'restaurant_name' => 'Polo Nord',
                'restaurant_description' => 'Una gelateria incantevole, dove il fresco profumo di gelato artigianale si mescola con l\'entusiasmo dei clienti. Offre una vasta gamma di gusti creativi e classici, trasformando ogni visita in un\'esperienza golosa e indimenticabile.',
                'restaurant_address' => 'Via Portanza 15',
                'restaurant_image' => '',
                'phone_number' => '0280032393',
                'vat_number' => '11111111119',
                'user_id' => 10,
            ],
            [
                'restaurant_name' => 'Ruspantino',
                'restaurant_description' => '
                Una rosticceria romana autentica che delizia i sensi con i profumi e i sapori della cucina tradizionale romana. Offre prelibatezze croccanti e succulente, come supplì, arancini e altre specialità fritte, perfette da gustare in ogni momento della giornata.',
                'restaurant_address' => 'Via Porta Fiume 24',
                'restaurant_image' => '',
                'phone_number' => '0280012354',
                'vat_number' => '11111111123',
                'user_id' => 11,
            ],
            [
               
                'restaurant_name' => 'Mc Donald\'s',
                'restaurant_description' => 'Scopri il mondo McDonald\'s: gustosi panini e patatine, insalate, sfiziosità e colazioni. McDrive, Happy Meal, feste di compleanno e tanto altro!',
                'restaurant_address' => 'Via Torino 68',
                'restaurant_image' => '',
                'phone_number' => '0284246454',
                'vat_number' => '11111111111',
                'user_id' => 12,
            ]
        ];
        foreach ($restaurants as $restaurantData) {
            $restaurant = Restaurant::create([
                'restaurant_name' => $restaurantData['restaurant_name'],
                'restaurant_description' => $restaurantData['restaurant_description'],
                'restaurant_address' => $restaurantData['restaurant_address'],
                'phone_number' => $restaurantData['phone_number'],
                'vat_number' => $restaurantData['vat_number'],
                'user_id' => $restaurantData['user_id'],
            ]);
            // Verifica se il ristorante è presente nell'array $restaurantTypes
            if (array_key_exists($restaurantData['restaurant_name'], $types)) {
                // Ottieni le tipologie associate al ristorante
                $typesForRestaurant = $types[$restaurantData['restaurant_name']];
        
                // Associa le tipologie al ristorante
                $restaurant->types()->attach($typesForRestaurant);
            }
        }
    }
}
