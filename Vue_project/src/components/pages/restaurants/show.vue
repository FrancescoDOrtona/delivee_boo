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
        productExists(newProduct){
            return this.products.some((product)=>product.name === newProduct.name )
        },
        addProduct(product) {
            let newProduct = {
                name: product.name,
                price: product.price,
                image: product.image,
                quantity: 1,
            }
            if (this.productExists(newProduct)){
                console.log('il prodotto è gia presente')
                this.products.forEach((product)=> {
                    if(product.name == newProduct.name){
                        product.quantity = product.quantity + 1
                        console.log(product.quantity)
                    }
                })
            }else{
                console.log('il prodotto non è presente')
                this.products.push(newProduct)
                console.log(this.products)
            }
        },
        increaseQuantity(product){
            product.quantity = product.quantity + 1
        },
        decreaseQuantity(product){
            if(product.quantity == 1){
                this.products.pop(product)  
            }
            else if(product.quantity > 0){
                product.quantity = product.quantity - 1
            }
        }
    },
    created() {
        this.fetchShow()

    },
}
</script>

<template>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="">
                <router-link :to="{ name: 'restaurants.index' }" class="router-link"><i
                        class="fa-solid fa-arrow-left green"></i> Indietro</router-link>
            </div>
            <div class="row restaurant-head ">
                <div class="col-6" v-if="restaurant">
                    <img class="img-restaurant" :src="`http://127.0.0.1:8000/storage/${restaurant.restaurant_image}`"
                        alt="">
                </div>
                <div class="col-6 d-flex d-sm-block align-items-center info-restaurant">
                    <h2 class="fw-bold py-3 py-sm-1" v-if="restaurant">
                        {{ restaurant.restaurant_name }}
                    </h2>
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
                        <p v-if="restaurant">
                            {{ restaurant.restaurant_description }}
                        </p>
                    </div>
                    <div class="py-5">
                        <h4>I nostri prodotti</h4>
                        <div class="grid" v-if="restaurant">

                            <div class="card p-3 flex-row justify-content-between" v-for="product in restaurant.products">
                                <div class="product-text mx-2 flex-grow-1">
                                    <h6>{{ product.name }}</h6>

                                    <p>{{ product.description }}</p>
                                </div>
                                <div class="">
                                    <img class="product-img" :src="`http://127.0.0.1:8000/storage/${product.image}`" alt="">
                                </div>
                                <button @click="addProduct(product)" class="product-add">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CART -->
                <div class="col-3">
                    <div class="card justify-content-end p-4">
                        <ul v-for="product in this.products">
                            <li>{{ product.name }}</li>
                            <li>{{ product.price }}</li>
                            <li>
                                <button @click="increaseQuantity(product)">+</button>
                                {{ product.quantity }}
                                <button @click="decreaseQuantity(product)">-</button>
                            </li>
                        </ul>
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

.row {
    margin: 0px;
    padding: 0px;
}

.img-restaurant {
    width: 100%;
    border-radius: 5px;
    max-height: 500px;
    object-fit: cover;
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
    padding: 50px 48px;
    max-width: 1980px !important;
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
    width: 100px;
    height: 100px;
    border-radius: 5px;
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


@media (max-width: 575.98px) {}

// Small devices (landscape phones, 576px and up)
@media (min-width: 576px) and (max-width: 767.98px) {}

// Medium devices (tablets, 768px and up)
@media (min-width: 768px) and (max-width: 991.98px) {}

@media (min-width: 992px) and (max-width: 1499.98px) {}
</style>