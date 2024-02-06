<template>
    <div class="types-section container">
        <div class="title">
            <h1>Types</h1>
        </div>
        <div class="types-section_badges top-row">
            <div class="badge">
                <img  class="badge-img" src="https://img2.storyblok.com/filters:format(webp)/f/62776/512x256/8bd9a1cb99/bowl-wide.jpg" alt="">
                <div class="badge-title">
                    <h5>Sushi</h5>
                </div>
            </div>
            <div class="badge">
                <img  class="badge-img" src="https://www.buttalapasta.it/wp-content/uploads/2017/11/pizza-margherita.jpg" alt="">
                <div class="badge-title">
                    <h5>Pizza</h5>
                </div>
            </div>
            <div class="badge">
                <img  class="badge-img" src="https://www.vicenzatoday.it/~media/horizontal-hi/3310647164206/kebab1-2-3.jpg" alt="">
                <div class="badge-title">
                    <h5>Kebab</h5>
                </div>
            </div>
            <div class="badge">
                <img  class="badge-img" src="https://media-assets.lacucinaitaliana.it/photos/61faa3986a4f2380a67589eb/1:1/w_1280%2Cc_limit/13da6d68-315b-4b78-a520-af4091b2d23e.jpg" alt="">
                <div class="badge-title">
                    <h5>Indiano</h5>
                </div>
            </div>
            <div class="badge">
                <img  class="badge-img" src="https://media-assets.lacucinaitaliana.it/photos/61fa51881c69086afcf291b8/3:2/w_1155,h_770,c_limit/mangiare-al-fastfood.jpg" alt="">
                <div class="badge-title">
                    <h5>Fast Food</h5>
                </div>
            </div>
            <div class="badge">
                <img  class="badge-img" src="https://birrasanbiagio.com/wp-content/uploads/2019/01/birra-artigianale-per-pub-rubinetti.jpg" alt="">
                <div class="badge-title">
                    <h5>Pub</h5>
                </div>
            </div>
        </div>
        <div class="types-section_badges bottom-row">
            <div class="badge">
                <img  class="badge-img" src="https://www.cucchiaio.it/content/cucchiaio/it/ricette/2009/12/ricetta-piadina-romagnola/_jcr_content/header-par/image_single.img.jpg/1544440397321.jpg" alt="">
                <div class="badge-title">
                    <h5>Piadina</h5>
                </div>
            </div>
            <div class="badge">
                <img  class="badge-img" src="https://www.salepepe.it/files/2018/03/Pasticcerie-Milano.jpg" alt="">
                <div class="badge-title">
                    <h5>Pasticceria</h5>
                </div>
            </div>
            <div class="badge">
                <img  class="badge-img" src="https://www.focus.it/images/2020/09/03/gelato_1020x680.jpg" alt="">
                <div class="badge-title">
                    <h5>Gelato</h5>
                </div>
            </div>
            <div class="badge">
                <img  class="badge-img" src="https://www.soniaperonaci.it/wp-content/uploads/2019/03/Rosticceria-siciliana-2.jpg" alt="">
                <div class="badge-title">
                    <h5>Rosticceria</h5>
                </div>
            </div>
            <div class="badge">
                <img  class="badge-img" src="https://langhe.net/wp-content/uploads/2019/02/pacchetto-mangiare4.jpg" alt="">
                <div class="badge-title">
                    <h5>Ristorante</h5>
                </div>
            </div>
            <div class="badge">
                <img  class="badge-img" src="https://media-cdn.tripadvisor.com/media/photo-s/07/54/7d/f8/bel-bel-yogurteria.jpg" alt="">
                <div class="badge-title">
                    <h5>Yogurteria</h5>
                </div>
            </div>
            
        </div>
    </div>
</template>

<script>
    export default {
        
    }
</script>

<style lang="scss" scoped>
@use '../../../../style/partials/variables' as *;

.types-section{
    padding:32px 64px;
}

.badge-img{
    //clip-path: polygon(20.7% 0%, 100% 0%, 79.3% 100%, 0% 100%); 
    border-radius: 47% 53% 54% 46% / 38% 36% 64% 62% ;
    width: 120px;
    height: 80px;
    object-fit: cover;
    filter: drop-shadow(7px 5px 3px rgba(0, 0, 0, 0.555));
}

.badge-title{
    color: $text-gray;
}

/* .types-section_badges {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
    grid-gap: 5px;
    justify-items: center;
}
*/

.types-section_badges {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
    grid-gap: 10px;
}


.badge {
    text-align: center;
    position: relative;
    padding: 15px 0px;
}

.badge-title {
    position: absolute;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(1, 204, 188, 0.7);
    color: $light-gray-footer;
    padding: 5px 10px;
    border-radius: 10px;
    h5{
        margin: 0;
    }
}

.top-row .badge:nth-child(odd){
    grid-column: span 2;
}
.bottom-row .badge:nth-child(even){
    grid-column: span 2;
}


</style>