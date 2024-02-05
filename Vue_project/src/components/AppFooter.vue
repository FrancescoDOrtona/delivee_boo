<template>
    <footer>
        <div class="container">
            <div class="row justify-content-center gap-10">
                <ul class="col-3 py-3 px-4">
                    <li class="fs-5"><strong>Scopri Deliveboo</strong></li>
                    <li><a href="">Chi siamo</a></li>
                    <li><a href="">Ristoranti</a></li>
                    <li><a href="">Lavora con noi</a></li>
                </ul>
                <ul class="col-3 py-3 px-4">
                    <li class="fs-5"><strong>Note legali</strong></li>
                    <li><a href="">Termini & Condizioni</a></li>
                    <li><a href="">Informativa sulla privacy</a></li>
                    <li><a href="">Cookies</a></li>
                </ul>
                <ul class="col-3 py-3 px-4">
                    <li class="fs-5"><strong>Aiuto</strong></li>
                    <li><a href="">Contatti</a></li>
                    <li><a href="">FAQ</a></li>
                    <li><a href="">Tipi di cucina</a></li>
                </ul>
            </div>
            <div class="row justify-content-between">
                <div class="col-2 d-flex gap-3">
                    <a href=""><i class="fa-brands fa-facebook fs-5"></i></a>
                    <a href=""><i class="fa-brands fa-instagram fs-5"></i></a>
                    <a href=""><i class="fa-brands fa-x-twitter fs-5"></i></a>
                </div>
                <div class='col-2'>
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
.row {
    gap: 20px;

    ul{
        background-color: #434848;
        border-radius: 7px;
        li:nth-child(n+2):hover{
            color: $main-brand-color;
        }
    }
}
</style>