<script>
import axios from 'axios';
import { store } from '../../../store';
</script>

<template>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="">
                <router-link :to="{ name: 'restaurants.index' }" class="router-link"><i
                        class="fa-solid fa-arrow-left green"></i> Indietro</router-link>
            </div>
            <div class="row restaurant-head ">
                <div class="col-6">
                    <img class="img-restaurant"
                        src="https://blog.giallozafferano.it/trasentieriefornelli/wp-content/uploads/2022/03/IMG_0015-960x640.jpg"
                        alt="">
                </div>
                <div class="col-6 d-flex d-sm-block align-items-center info-restaurant">
                    <h2 class="fw-bold py-3 py-sm-1">Poke House</h2>
                    <div class="pt-2 d-none d-sm-block">
                        15 - 25 min· Poke·Sushi
                    </div>
                    <div>
                        Distanza: 1.18 km · Chiude alle 22:30 · Minimo d'ordine: 10,00 € · Consegna gratuita
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="hr-shadow">

    <div class="body-products">
        <div class="container-fluid ">
            <div class="row justify-content-between">
                <div class="col-12 flex-column">
                    <div class="description card p-3">
                        <h5>Le informazioni sul nostro ristorante</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum, minima! Lorem ipsum dolor
                            sit amet consectetur adipisicing elit. Tempora, ratione.</p>
                    </div>
                    <div class="py-5">
                        <h4>I nostri prodotti</h4>
                        <div class="grid">
                            <div class="card p-3 flex-row justify-content-between">
                                <div class="product-text mx-2 flex-grow-1">
                                    <h6>nome prodotto</h6>
                                    <p>ingredienti</p>
                                </div>
                                <div class="">
                                    <img class="product-img"
                                        src="https://blog.giallozafferano.it/nonsolodolciit/wp-content/uploads/2021/01/45188dc1-add3-4e3a-b0b3-7e198ce8fa75.png"
                                        alt="">
                                </div>
                                <div class="product-add">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>

                            <div class="card p-3 flex-row justify-content-between">
                                <div class="product-text mx-2 flex-grow-1">
                                    <h6>nome prodotto</h6>
                                    <p>ingredienti</p>
                                </div>
                                <div class="">
                                    <img class="product-img"
                                        src="https://blog.giallozafferano.it/nonsolodolciit/wp-content/uploads/2021/01/45188dc1-add3-4e3a-b0b3-7e198ce8fa75.png"
                                        alt="">
                                </div>
                                <div class="product-add">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>

                            <div class="card p-3 flex-row justify-content-between">
                                <div class="product-text mx-2 flex-grow-1">
                                    <h6>nome prodotto</h6>
                                    <p>ingredienti</p>
                                </div>
                                <div class="">
                                    <img class="product-img"
                                        src="https://blog.giallozafferano.it/nonsolodolciit/wp-content/uploads/2021/01/45188dc1-add3-4e3a-b0b3-7e198ce8fa75.png"
                                        alt="">
                                </div>
                                <div class="product-add">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>

                            <div class="card p-3 flex-row justify-content-between">
                                <div class="product-text mx-2 flex-grow-1">
                                    <h6>nome prodotto</h6>
                                    <p>ingredienti</p>
                                </div>
                                <div class="">
                                    <img class="product-img"
                                        src="https://blog.giallozafferano.it/nonsolodolciit/wp-content/uploads/2021/01/45188dc1-add3-4e3a-b0b3-7e198ce8fa75.png"
                                        alt="">
                                </div>
                                <div class="product-add">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

                <!-- CART -->
                <div class="col-3">
                    <div class="card justify-content-end p-4">
                        <p>il carrello è vuoto</p>
                        <button class="btn btn-secondary ">Vai al pagamento</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import "../../../../style/partials/variables.scss";


.test {
    visibility: hidden;
}
@media (max-width: 1400px){
    .grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr) !important;
        gap: 20px;
    }

}

@media (max-width: 1000px) {
    .restaurant-head {
        .col-6 {
            width: 100%;
        }
    }

    .search-badge{
        display: none !important;
    }
    .grid {
        display: grid;
        grid-template-columns: repeat(1, 1fr) !important;
        gap: 20px;
    }
}


.row{
    margin: 0px;
    padding: 0px;
}
.img-restaurant {
    width: 100%;
}

.grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

.body-products {
    background-color: #f9fafa;
}

.col-3 {

    .card {
        height: 300px;
        width: 300px;
        min-height: 250px;
        content: '';
        display: flex;
        flex-shrink: 0;
    }
}


.col-9 {
    display: flex;
    justify-content: start;
}

.container-fluid {
    padding: 50px 0 !important;

    max-width: 1980px !important;
}

img {
    width: 100%;
    border-radius: 5px;
}

.hr-shadow {
    box-shadow: 2px 4px 10px 2px #767676;
}

.green {
    color: $main-brand-color;
}

.router-link {
    color: $main-brand-color;
    text-decoration: none;
}

.product-img {
    max-width: 100px;
    max-height: 100px;
}

.product-add {
    height: 100%;
    border: 1px solid #bfbfbf;
    border-radius: 2px;
    width: 35px;
    margin-left: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: $main-brand-color;
}</style>