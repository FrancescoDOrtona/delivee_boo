<script>
import axios from 'axios';
import { store } from '../../../store';

export default {
    props: {
        id: String,
    },
    data() {
        return {
            store,
            restaurant: null,
            BASE_URL: 'http://127.0.0.1:8000/api',
            products: [],
            totalPrice: 0,

        }
    },
    methods: {
        fetchShow() {
            axios.get(`${this.BASE_URL}/restaurants/${this.id}`)
                .then(res => {
                    console.log(res.data);
                    this.restaurant = res.data.restaurant;
                }).catch((error) => {
                    console.log('post not found', error.response)
                })
        },
        productExists(newProduct) {
            return this.products.some((product) => product.name === newProduct.name)
        },
        addProduct(product) {
            let newProduct = {
                name: product.name,
                price: product.price,
                image: product.image,
                quantity: 1,
            }
            if (this.productExists(newProduct)) {
                console.log('il prodotto è gia presente')
                this.products.forEach((product) => {
                    if (product.name == newProduct.name) {
                        product.quantity = product.quantity + 1
                        console.log(product.quantity)
                    }
                })
            } else {
                console.log('il prodotto non è presente')
                this.products.push(newProduct)
                console.log(this.products)
            }
        },
        increaseTotalPrice() {
            this.totalPrice = this.products.reduce((total, product) => {
                return +(Math.round((total += product.price * product.quantity) * 100) / 100).toFixed(2);
            }, 0);
        },
        decreaseTotalPrice() {
            this.totalPrice = this.products.reduce((total, product) => {
                return +(Math.round((total += product.price * product.quantity) * 100) / 100).toFixed(2);
            }, 0);
        },
        increaseQuantity(product) {
            product.quantity = product.quantity + 1;
            this.increaseTotalPrice();
        },
        decreaseQuantity(product) {
            if (product.quantity == 1) {
                this.products.splice(this.products.indexOf(product), 1);
            } else if (product.quantity > 0) {
                product.quantity = product.quantity - 1;
            }
            this.decreaseTotalPrice();
        }
    },
    created() {
        this.fetchShow()

    },
}
</script>

<template>
    <div class="container-fluid page-top-margin">
        <div class="row">
            <div class="mb-3">
                <router-link :to="{ name: 'restaurants.index' }" class="btn btn-light router-link">
                    <i class="fa-solid fa-arrow-left brand-color"></i>Indietro</router-link>
            </div>
            <div class="row restaurant-head ">
                <div class="col-4">
                    <img v-if="restaurant.restaurant_image" class="img-restaurant" :src="`http://127.0.0.1:8000/storage/${restaurant.restaurant_image}`"
                        alt="">
                    <img v-else class="img-restaurant" src="https://consumer-component-library.roocdn.com/27.1.19/static/images/placeholder.svg" alt="">
                </div>
                <div class="col-4">
                    <div class="info-restaurant">
                        <h2 class="fw-bold">
                            {{ restaurant.restaurant_name }}
                        </h2>                    
                        <p class="icons_align"><i class="fa-solid fa-clock fs-5"></i>15 - 25 min· Poke·Sushi</p>
                        <p class="icons_align"><i class="fa-solid fa-map-location fs-5"></i>Distanza: 1.18 km · Chiude alle 22:30 · Consegna gratuita</p>                   
                        <p class="icons_align"><i class="fa-solid fa-circle-info fs-5"></i>{{ restaurant.restaurant_description }}</p>
                    </div>
                </div>
                <div class="col-4 d-flex flex-column align-items-center">
                    <div class="d-flex gap-2 justify-content-center">
                        <span><i class="fa-solid fa-person-biking"></i></span>
                        <h5>Consegna in 25-30 minuti</h5>
                    </div>
                    <button class="btn btn-light head_button">Avvia ordine di Gruppo</button>
                </div>
            </div>
        </div>
    </div>
    <hr class="hr-shadow">

    <div class="body-products">
        <div class="container-fluid ">
            <div class="row justify-content-between row-gap-5">
                <div class="col-md-12">
                    <h4>I nostri prodotti</h4>
                </div>
                <div class="col-12 col-lg-9">
                    <div class="grid">
                        <div class="card p-3 flex-row justify-content-between" v-for="(product, index) in restaurant.products" :key="index">
                            <div class="product-text mx-2 flex-grow-1">
                                <h6 class="fw-bold">{{ product.name }}</h6>
                                <p>{{ product.description }}</p>
                                <small>{{ product.price }} €</small>
                            </div>
                            <div class="product-card_quantity">
                                <img class="product-img" :src="`http://127.0.0.1:8000/storage/${product.image}`" alt="">
                                <div>
                                    <button class="round_button" @click="decreaseQuantity(product)">
                                        <i class="fa-solid fa-minus"></i>
                                    </button>
                                    <span>0</span>
                                    <button class="round_button" @click="addProduct(product), increaseQuantity(product)">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                </div>                                   
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CART -->
                <div class="col-12 col-lg-3 chart-side">
                    <div class="card chart_container p-4">
                        <div class="chart_title">
                            <h4>Il tuo ordine</h4>
                        </div>
                        <div class="chart_items">
                            <ul class="chart" v-for="product in this.products">
                                {{  product.quantity }}
                                <li>
                                    <p>{{ product.name }}</p>
                                </li>

                                <li class="chart_quantity">
                                    <button class="round_button" @click="decreaseQuantity(product)">
                                        <i class="fa-solid fa-minus"></i>
                                    </button>
                                    <span class="total_quantity">
                                        {{ product.quantity }}
                                    </span>
                                    <button class="round_button" @click="increaseQuantity(product)">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                    <span class="product_price">{{ (Math.round((product.price * product.quantity) * 100) / 100).toFixed(2) }}
                                        €</span>
                                </li>
                            </ul>
                        </div>
                        <div class="chart_total">
                            <h5>Totale: {{ this.totalPrice }} €</h5>
                            <button class="btn btn-secondary ">Vai al pagamento</button>
                        </div>
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

p{
    margin: 0;
}
@media (max-width: 1400px) {
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

    .search-badge {
        display: none !important;
    }

    .grid {
        display: grid;
        grid-template-columns: repeat(1, 1fr) !important;
        gap: 20px;
    }
}

@media(max-width: 766px) {
    .container-fluid {
        padding: 50px 0px !important;
    }
}

@media (max-width: 500px) {
    .col-3 {
        width: 100% !important;

        .card {
            width: 100% !important;
        }
    }
}

.page-top-margin{
    margin-top: 100px;
}

.row {
    margin: 0px;
    padding: 0px;
}

.icons_align{
    display: flex;
    align-items: center;
    gap: 10px;
    i{
        color: lightgray;
    }
}
.img-restaurant {
    width: 100%;
    border-radius: 5px;
    max-height: 500px;
    object-fit: cover;
}

.info-restaurant{
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.head_button{
    color: $main-brand-color;
    border: 1px solid lightgray;
}
.grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

.body-products {
    background-color: #f9fafa;
}


.col-9 {
    display: flex;
    justify-content: start;
}

.hr-shadow {
    box-shadow: 2px 4px 10px 2px #767676;
}

.brand-color {
    color: $main-brand-color;
}

.router-link {
    color: $main-brand-color;
    text-decoration: none;
    border: 1px solid lightgray;
    &:hover{
        color: $main-brand-color;
    }
    i{
        margin-right: 10px;
    }
}

.product-img {
    width: 100px;
    height: 100px;
    border-radius: 5px;
}

.product-card_quantity{
    display: flex;
}

.product-add {
    height: 100%;
    border: 1px solid #bfbfbf;
    border-radius: 2px;
    padding: 10px;
    margin-left: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: $main-brand-color;
}

.product_price{
    min-width: 60px;
    text-align: end;
}

.round_button {
    display: flex;
    align-items: center;
    color: $main-brand-color;
    padding: 4px;
    font-size: 14px;
    border: 1px solid $main-brand-color;
    border-radius: 50%;
    overflow: hidden;
    text-align: center;
    aspect-ratio: 1;
}

.chart_quantity {
    display: flex;
    align-items: center;
    gap: 8px;
}

.total_quantity {
    min-width: 20px;
    display: flex;
    justify-content: center;
}

.chart_container{
    height: 800px;
    display: flex;
    position: sticky;
    top: 20px;
}

.chart {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 6px;
    padding: 15px 0px;
    margin: 0;

}

.chart_title{
    border-bottom: 1px solid lightgray;
    h4{
        margin: 0;
        padding-bottom: 15px;
    }
}

.chart_items{
    flex-grow: 1;
    overflow: auto;
}

.chart_total{
    display: flex;
    flex-direction: column;
    border-top: 1px solid lightgray;
    h5{
        margin: 0;
        padding: 15px 0;
    }
    button{
        background-color: $main-brand-color;
        border: none;
        padding: 10px 0;
    }
}

@media (max-width: 575.98px) {}

// Small devices (landscape phones, 576px and up)
@media (min-width: 576px) and (max-width: 767.98px) {}

// Medium devices (tablets, 768px and up)
@media (min-width: 768px) and (max-width: 991.98px) {}

@media (min-width: 992px) and (max-width: 1499.98px) {}
</style>