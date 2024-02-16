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
            currentRestaurantId: 0, // Variabile per tenere traccia dell'ID del ristorante attualmente visualizzato
            cartId: 0,
            BASE_URL: 'http://127.0.0.1:8000/api',
            products: [],
            totalPrice: 0,
            cartVisible: false, // Variabile per mostrare o nascondere il carrello
            modalVisible: false,
            preventDefaultEvent: false

        }
    },
    methods: {
        fetchShow() {
            axios.get(`${this.BASE_URL}/restaurants/${this.id}`)
                .then(res => {
                    this.restaurant = res.data.restaurant;
                    this.currentRestaurantId = this.restaurant.id; // Imposta l'ID del ristorante attualmente visualizzato
                }).catch((error) => {
                    console.log('post not found', error.response)
                })
        },
        productExists(newProduct) {
            return this.products.some((product) => product.name === newProduct.name)
        },
        addProductToCart(product) {
            console.log(this.currentRestaurantId , this.products);
            let newProduct = {
                restaurant_id: this.restaurant.id,
                product_id: product.id,
                name: product.name,
                price: product.price,
                image: product.image,
                quantity: 1,
            }
            if (this.productExists(newProduct)) {
                this.products.forEach((product) => {
                    if (product.name == newProduct.name) {
                        product.quantity = product.quantity + 1
                    }
                })
            } else {
                this.products.push(newProduct)
            }
            this.increaseTotalPrice(); //Aumenta il prezzo totale
            // Salva i dati nel local storage per renderli persistenti sul cambio di pagina
            localStorage.setItem('cart', JSON.stringify(this.products));
            localStorage.setItem('cartId', this.cartId);
            localStorage.setItem('price', this.totalPrice);

        },
        addProduct(product) {
            // Assegniamo l'id del carrello tramite il prodotto aggiunto del ristorante
            this.cartId = this.restaurant.id
            console.log(this.cartId)
            // Verifica se il carrello è vuoto o associato a un altro ristorante
            if (this.currentRestaurantId !== this.restaurant.id) {
                // Mostra la modale
                this.showModal();

            } else {
                // Aggiunge il prodotto al carrello senza mostrare la modale
                this.addProductToCart(product);
            }
        },
        removeProduct(productToRemove) {
            for (let i = 0; i < this.products.length; i++) {
                const product = this.products[i];
                if (product === productToRemove) {
                    if (product.quantity === 1) {
                        this.products.splice(i, 1);
                    } else {
                        product.quantity--;
                    }
                    break; // Esci dal ciclo dopo aver modificato il prodotto
                }
            }
            this.decreaseTotalPrice();
            localStorage.setItem('cart', JSON.stringify(this.products));
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
        cartShow(current) {
            console.log(this.cartVisible, this.currentRestaurantId, this.restaurant.id)
            if (!this.cartVisible || current === this.cartId) {
                return this.cartVisible = true;
            }
        },
        showModal() {
            // Mostra la modale (imposta una variabile di stato per gestire la visualizzazione della modale)
            this.modalVisible = true;

            // Blocca temporaneamente l'evento predefinito
            this.preventDefaultEvent = true;
        },

        hideModal() {
            // Nasconde la modale (imposta la variabile di stato per nascondere la modale)
            this.modalVisible = false;

            // Riabilita l'evento predefinito
            this.preventDefaultEvent = false;
        },

        confirmAction() {
            // Nasconde la modale
            this.hideModal();

            // Aggiunge il prodotto al carrello dopo che l'utente ha confermato l'azione
            this.addProductToCart(product);
        },

    },
    created() {
        this.fetchShow();

    }, mounted() {
        // recuperiamo i dati dal local storage quando cambiamo pagina per mantenere il carrello aggiornato
        const cartData = localStorage.getItem('cart');
        if (cartData) {
            this.products = JSON.parse(cartData);
        };

        const cartDataId = localStorage.getItem('cartId');
        if (cartDataId) {
            this.cartId = +cartDataId;
        }

        const price = localStorage.getItem('price');
        if (price) {
            this.totalPrice = +price;
        }

        // ci mostra il contenuto del carrello solo se l'id del carrello è uguale all'id del ristorante corrente
        this.cartShow(this.currentRestaurantId);
        console.log(this.cartId, typeof (this.cartId))


    },
    watch: {
        'restaurant.id'(newId, oldId) {
            console.log(newId, oldId)
            if (newId !== oldId) {
                if (this.products.length > 0) {
                    this.cartVisible = false; // Nascondi il carrello solo se ci sono prodotti nel carrello
                }
            }
        }
    }
}
</script>

<template>
    <div class="bg-image"></div>
     <!-- La tua modale qui -->
     <div  class="modal ">
                    <!-- Contenuto della modale -->
                    <div>modaleeeeeeeeeeeeeeeeeeeeeeeeeeeeeee</div>
                    <button @click="hideModal">Annulla</button>
                    <button @click="confirmAction">Conferma</button>
    </div>
    <div class="container-fluid page-top-margin border_btm">
        <div class="row">
            <div class="mb-3">
                <router-link :to="{ name: 'restaurants.index' }" class="btn btn-light router-link">
                    <i class="fa-solid fa-arrow-left brand-color"></i>Indietro</router-link>
                </div>
                <div class="row restaurant-head ">
                    <div class="col-12 col-md-4">
                        <img v-if="restaurant.restaurant_image" class="img-restaurant"
                        :src="`http://127.0.0.1:8000/storage/${restaurant.restaurant_image}`" alt="">
                        <img v-else class="img-restaurant"
                        src="https://consumer-component-library.roocdn.com/27.1.19/static/images/placeholder.svg" alt="">
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="info-restaurant">
                            <h2 class="fw-bold">
                                {{ restaurant.restaurant_name }}
                            </h2>
                            <p class="icons_align"><i class="fa-solid fa-clock fs-5"></i>15 - 25 min· Poke·Sushi</p>
                            <p class="icons_align"><i class="fa-solid fa-map-location fs-5"></i>Distanza: 1.18 km · Chiude alle
                            22:30 · Consegna gratuita</p>
                            <p class="icons_align"><i class="fa-solid fa-circle-info fs-5"></i>{{
                                restaurant.restaurant_description }}</p>
                    </div>
                </div>
                <div class="col-12 col-md-4 d-flex flex-column align-items-center">
                    <div class="d-flex gap-2 justify-content-center">
                        <span><i class="fa-solid fa-person-biking"></i></span>
                        <h5>Consegna in 25-30 minuti</h5>
                    </div>
                    <button class="btn btn-light head_button">
                        <i class="fa-solid fa-users"></i>
                        <span>Avvia ordine di Gruppo</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
   
    
    <div class="body-products">
        <div class="container-fluid ">
            <div class="row justify-content-between row-gap-5">
                <div class="col-md-12">
                    <h4>I nostri prodotti</h4>
                </div>
                <div class="col-12 col-lg-9">
                    <div class="grid">
                        <div class="card p-3 flex-column flex-lg-row" v-for="(product, index) in restaurant.products"
                        :key="index">
                        <div class="col-12 col-md-6 col-lg-8 product-text mx-2 flex-grow-1">
                            <div class="products-card_title">
                                <h6 class="fw-bold">{{ product.name }}</h6>
                                <template v-for="(p, idx) in this.products" :key="idx">
                                    <template v-if="p.id === product.id">
                                        <span>x{{ p.quantity }}</span>
                                    </template>
                                </template>
                                </div>
                                <p>{{ product.description }}</p>
                                <small>{{ product.price }} €</small>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 justify-content-lg-end products_card_side">
                                <img class="product-img" :src="`http://127.0.0.1:8000/storage/${product.image}`" alt="">
                                <div class="product-card_quantity">
                                    <button class="square_button btn btn-light" @click="removeProduct(product)">
                                        <i class="fa-solid fa-minus"></i>
                                    </button>
                                    <button class="btn btn-light square_button" @click="addProductToCart(product)">
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
                        <template v-if="cartVisible && currentRestaurantId === cartId">
                            <div class="chart_items">
                                <ul class="chart" v-for="product in this.products">
                                    <li>
                                        <p>{{ product.name }}</p>
                                    </li>

                                    <li class="chart_quantity">
                                        <button class="round_button" @click="removeProduct(product)">
                                            <i class="fa-solid fa-minus"></i>
                                        </button>
                                        <span class="total_quantity">
                                            {{ product.quantity }}
                                        </span>
                                        <button class="round_button" @click="addProductToCart(product)">
                                            <i class="fa-solid fa-plus"></i>
                                        </button>
                                        <span class="product_price">{{ (Math.round((product.price * product.quantity) * 100)
                                            /
                                            100).toFixed(2) }}
                                            €</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="chart_total">
                                <h5>Totale: {{ this.totalPrice }} €</h5>
                                <router-link :to="{ name: 'checkout' }" class="btn btn-light btn-main-color ">Vai al
                                    pagamento</router-link>
                            </div>
                        </template>
                        <template v-else>
                            <div class="chart_total">
                                <p class="cart-empty">
                                    <svg height="80" width="120" viewBox="0 0 24 24" role="presentation" focusable="false"
                                        class="ccl-2608038983f5b413 ccl-73d4ddfccb057499 ccl-4475ede65a9c319d">
                                        <path
                                            d="M14 15V13H10V15H14ZM15 15H19.1872L19.7172 13H15V15ZM14 12V10H15V12H19.9822L20.5122 10H3.48783L4.01783 12H9V10H10V12H14ZM14 18V16H10V18H14ZM15 18H18.3922L18.9222 16H15V18ZM9 15V13H4.28283L4.81283 15H9ZM9 18V16H5.07783L5.60783 18H9ZM7 8V3H17V8H23L20 20H4L1 8H7ZM9 8H15V5H9V8Z"
                                            fill="#dddddd"></path>
                                    </svg>
                                </p>
                                <h4 class="text-center text-secondary">Il Carrello é vuoto</h4>
                                <button class="btn btn-secondary disabled">Vai al pagamento</button>
                            </div>
                        </template>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import "../../../../style/partials/variables.scss";
@import "../../../../style/partials/mixins.scss";

.bg-image {
    width: 100%;
    height: 100%;
    background-image: url(../../../public/wave-haikei-4.svg);
    background-size: cover;
    background-repeat: no-repeat;
    right: 0;
    top: 0;
    position: absolute;
    z-index: -10;
}


.active {
    border: 1px solid green;
}

.test {
    visibility: hidden;
}

p {
    margin: 0;
}

.page-top-margin {
    margin-top: 100px;
}

.row {
    margin: 0px;
    padding: 0px;
}

.icons_align {
    display: flex;
    align-items: center;
    gap: 10px;

    i {
        color: gray;
    }
}

.img-restaurant {
    width: 100%;
    border-radius: 5px;
    max-height: 500px;
    object-fit: cover;
}

.info-restaurant {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.head_button {
    border: 1px solid lightgray;
    display: flex;
    gap: 10px;
    align-items: center;

    i {
        color: $main-brand-color;
    }
}

.grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}


.col-9 {
    display: flex;
    justify-content: start;
}


.brand-color {
    color: $main-brand-color;
}

.router-link {
    text-decoration: none;
    border: 1px solid lightgray;

    i {
        margin-right: 10px;
    }
}

.product-img {
    width: 100px;
    object-fit: cover;
    border-radius: 5px;
}

.product-card_quantity {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.square_button {
    border: 1px solid lightgray;
    color: $main-brand-color;
}

.products-card_title {
    display: flex;
    gap: 6px;
    align-items: baseline;
    padding: 8px 0px;
    line-height: 10px;

    span {
        font-weight: bold;
        color: $review-4-5-green;
    }

    h6 {
        margin: 0;
    }
}

.products_card_side {
    display: flex;
    gap: 6px;
    padding-right: 10px;

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

.product_price {
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

.chart_container {
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

.chart_title {
    border-bottom: 1px solid lightgray;

    h4 {
        margin: 0;
        padding-bottom: 15px;
    }
}

.chart_items {
    flex-grow: 1;
    overflow: auto;
}

.chart_total {
    display: flex;
    flex-direction: column;
    border-top: 1px solid lightgray;

    h5 {
        margin: 0;
        padding: 15px 0;
    }

    button {

        border: none;
        padding: 10px 0;
    }
}

.cart-empty {
    text-align: center;

}

.border_btm {
    border-bottom: 1px solid rgba(211, 211, 211, 0.5);
    padding-bottom: 20px;
}

.body-products {
    padding-top: 20px;
}



@media (max-width: 575.98px) {

    .restaurant-head {
        row-gap: 20px;
    }

    .grid {
        grid-template-columns: repeat(1, 1fr);
    }
}

// Small devices (landscape phones, 576px and up)
@media (min-width: 576px) and (max-width: 767.98px) {
    .restaurant-head {
        row-gap: 20px;
    }

    .grid {
        grid-template-columns: repeat(1, 1fr);
    }
}

// Medium devices (tablets, 768px and up)
@media (min-width: 768px) and (max-width: 991.98px) {
    .search-badge {
        display: none !important;
    }

    .grid {
        grid-template-columns: repeat(1, 1fr);
    }
}

@media (min-width: 992px) and (max-width: 1499.98px) {
    .grid {
        grid-template-columns: repeat(1, 1fr);
    }

}
</style>