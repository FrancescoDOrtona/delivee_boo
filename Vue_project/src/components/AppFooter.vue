<template>
    <footer>
        <div class="container container-custom-2">
            <div class="grid">
                <ul class=" py-2 px-3">
                    <li class="fs-5"><strong>Scopri Deliveboo</strong></li>
                    <li><a href="">Chi siamo</a></li>
                    <li><a href="">Ristoranti</a></li>
                    <li><a href="">Lavora con noi</a></li>
                </ul>
                <ul class=" py-2 px-3">
                    <li class="fs-5"><strong>Note legali</strong></li>
                    <li><a href="">Termini & Condizioni</a></li>
                    <li><a href="">Informativa sulla privacy</a></li>
                    <li><a href="">Cookies</a></li>
                </ul>
                <ul class=" py-2 px-3">
                    <li class="fs-5"><strong>Aiuto</strong></li>
                    <li><a href="">Contatti</a></li>
                    <li><a href="">FAQ</a></li>
                    <li><a href="">Tipi di cucina</a></li>
                </ul>
                <ul class="py-2 px-3">
                    <li class="fs-5 pb-2"><strong>Scarica Deliveboo sul tuo smartphone</strong></li>
                    <div class="download">
                        <img class="footer_download" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Download_on_the_App_Store_Badge_IT_RGB_blk.svg/2560px-Download_on_the_App_Store_Badge_IT_RGB_blk.svg.png" alt="">
                        <img class="footer_download h-43" src="https://upload.wikimedia.org/wikipedia/commons/5/5f/Google_Play_Store_badge_IT.svg" alt="">
                    </div>
                </ul>
            </div>
            <div class="row justify-content-between">
                <div class="col-2 d-flex gap-3">
                    <a href=""><i class="fa-brands fa-facebook fs-5"></i></a>
                    <a href=""><i class="fa-brands fa-instagram fs-5"></i></a>
                    <a href=""><i class="fa-brands fa-x-twitter fs-5"></i></a>
                </div>
                <div class='col-5 col-sm-2'>
                    <p>© 2024 Deliveboo</p>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
    export default {
        
    }
</script>

<style lang="scss" scoped>
@use '../../style/partials/mixins' as *;
@import "../../style/partials/variables";

footer{
    padding: 20px;
    color: white;
    background-color: $dark-gray-footer;
}

a {
  text-decoration: none;
  color: currentColor;
}
.grid {
    display: grid;
    grid-template-columns: repeat(4 , 1fr);
    gap: 10px;

    ul{
        background-color: #434848;
        border-radius: 7px;
        li:nth-child(n+2):hover{
            color: $main-brand-color;
        }
    }
}

@media (max-width: 575.98px) { 
    .grid {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 10px;
        }
}


@media (min-width: 575.98px) and (max-width: 768px) {
    .grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }
 }

.footer_download{
    width: 130px;
}

.download{
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.h-43{
    height: 43px;
}
</style>