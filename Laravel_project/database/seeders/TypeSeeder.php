<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['pizza','sushi','kebab','indiano','fast food','pub','piadina','pasticceria','gelato','rosticceria','ristorante','yogurteria'];

        $img_urls = [
            'https://www.buttalapasta.it/wp-content/uploads/2017/11/pizza-margherita.jpg',
            'https://img2.storyblok.com/filters:format(webp)/f/62776/512x256/8bd9a1cb99/bowl-wide.jpg',
            'https://www.vicenzatoday.it/~media/horizontal-hi/3310647164206/kebab1-2-3.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61faa3986a4f2380a67589eb/1:1/w_1280%2Cc_limit/13da6d68-315b-4b78-a520-af4091b2d23e.jpg',
            'https://media-assets.lacucinaitaliana.it/photos/61fa51881c69086afcf291b8/3:2/w_1155,h_770,c_limit/mangiare-al-fastfood.jpg',
            'https://birrasanbiagio.com/wp-content/uploads/2019/01/birra-artigianale-per-pub-rubinetti.jpg',
            'https://www.cucchiaio.it/content/cucchiaio/it/ricette/2009/12/ricetta-piadina-romagnola/_jcr_content/header-par/image_single.img.jpg/1544440397321.jpg',
            'https://www.salepepe.it/files/2018/03/Pasticcerie-Milano.jpg',
            'https://www.focus.it/images/2020/09/03/gelato_1020x680.jpg',
            'https://www.soniaperonaci.it/wp-content/uploads/2019/03/Rosticceria-siciliana-2.jpg',
            'https://langhe.net/wp-content/uploads/2019/02/pacchetto-mangiare4.jpg',
            'https://media-cdn.tripadvisor.com/media/photo-s/07/54/7d/f8/bel-bel-yogurteria.jpg'
        ];

        foreach($types as $index => $type){
            $new_type = new Type();
            $new_type->name = $type;
            $new_type->img_url = $img_urls[$index];
            $new_type->save();

        }

       
    }
}
