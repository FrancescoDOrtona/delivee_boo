<script>
import axios from 'axios';
import { store } from '../../../store';
export default {
    props: {
        restaurant: {
            type: Object,
            required: true,
        },
    },
    data() {
        return {
            store: store,
            BASE_URL: 'http://127.0.0.1:8000/api',
        }
    }, methods: {
        fetchRestaurants() {
            axios.get(`${this.BASE_URL}/restaurants`).then((res) => {
                // this.dataRT = res.data.results;
                // console.log(this.dataRT);

                this.store.dataRT = res.data.results;
                console.log(this.store.dataRT);

            });
        }
    }, created() {
        this.fetchRestaurants();
    }
}
</script>

<template>
    <!-- said-bar -->
    <div class="line-header d-flex justify-content-center align-items-center">
        <input type="text" class="z-3 search-input" placeholder="Ristoranti, spesa, piatti">
    </div>
    <div class="container-fluid ">
        <div class="d-flex">
            <div class="">
                <div class="side-bar">
                    <ul>
                        <li class="bottom-line">Caserta</li>
                        <ul class="bottom-line ">
                            <li class="pb-3 fw-light d-flex">
                                <input type="radio" name="option1" id="consegna">
                                <label for="consegna">Consegna</label>
                            </li>
                            <li class="fw-light d-flex">
                                <input type="radio" name="option1" id="Ritiro">
                                <label for="Ritiro">Ritiro</label>
                            </li>
                        </ul>
                        <div class="accordion" id="accordionPanelsStayOpenExample">

                            <div class="bottom-line ">
                                <h2 class="accordion-header">
                                    <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseOne">
                                        Ordina
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                                    <div class="accordion-body">
                                        <ul class="fw-light">
                                            <li class="pb-3 d-flex">
                                                <input type="radio" value="consegna" id="consegna" name="option2">
                                                <label for="consegna">Consegna più rapida</label>
                                            </li>
                                            <li class="pb-3 d-flex">
                                                <input type="radio" id="consigliati" name="option2" value="consigliati">
                                                <label for="consigliati">Consigliati</label>
                                            </li>
                                            <li class="pb-3 d-flex">
                                                <input type="radio" id="distanza" name="option2" value="distanza">
                                                <label for="distanza">Distanza</label>
                                            </li>
                                            <li class="pb-3 d-flex">
                                                <input type="radio" name="option2" id="votati" value="votati">
                                                <label for="votati">I più votati</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="bottom-line">
                                <h2 class="accordion-header">
                                    <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseTwo">
                                        Offerte
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <ul class="fw-light">
                                            <li class="d-flex">
                                                <input type="checkbox" class="me-1" id="accetta-contanti"
                                                    value="accetta-contanti" name="option3">
                                                <label for="accetta-contanti">Accetta contanti</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="bottom-line">
                                <h2 class="accordion-header">
                                    <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseThree">
                                        Regime alimentari
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <ul class="fw-light">
                                            <li class="pb-3 d-flex">
                                                <input type="checkbox" class="me-1" value="senza-glutine" name="option4"
                                                    id="senza-glutine">
                                                <label for="">Senza Glutine</label>
                                            </li>
                                            <li class="pb-3 d-flex">
                                                <input type="checkbox" class="me-1" name="option4" value="vegetariano"
                                                    id="vegetariano">
                                                <label for="vegetariano">Vegetariano</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="bottom-line">
                                <h2 class="accordion-header">
                                    <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseFoor" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseFoor">
                                        Buono pasto
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseFoor" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <ul class="fw-light">
                                            <li class="d-flex">
                                                <input type="radio" name="option5" value="ticket-restaurant"
                                                    id="ticket-restaurant">
                                                <label for="ticket-restaurant">Ticket Restaurant</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="bottom-line">
                                <h2 class="accordion-header">
                                    <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseFive">
                                        Cucine
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <ul class="fw-light">
                                            <li class="pb-3 d-flex">
                                                <label for=""></label>
                                                <input type="checkbox" class="me-1">Americano
                                            </li>
                                            <li class="pb-3 d-flex">
                                                <label for=""></label>
                                                <input type="checkbox" class="me-1">Cinese
                                            </li>
                                            <li class="pb-3 d-flex">
                                                <label for=""></label>
                                                <input type="checkbox" class="me-1">Colazione
                                            </li>
                                            <li class="pb-3 d-flex">
                                                <label for=""></label>
                                                <input type="checkbox" class="me-1">Giapponese
                                            </li>
                                            <li class="pb-3 d-flex">
                                                <label for=""></label>
                                                <input type="checkbox" class="me-1">Italiano
                                            </li>
                                            <li class="pb-3 d-flex">
                                                <label for=""></label>
                                                <input type="checkbox" class="me-1">Messicano
                                            </li>
                                            <li class="pb-3 d-flex">
                                                <label for=""></label>
                                                <input type="checkbox" class="me-1">Spagnolo
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="bottom-line">
                                <h2 class="accordion-header">
                                    <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseSix">
                                        Piatti
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <ul class="fw-light">
                                            <li class="pb-3 d-flex">
                                                <label for=""></label>
                                                <input type="checkbox" class="me-1">Hamburger
                                            </li>
                                            <li class="pb-3 d-flex">
                                                <label for=""></label>
                                                <input type="checkbox" class="me-1">Kebab
                                            </li>
                                            <li class="pb-3 d-flex">
                                                <label for=""></label>
                                                <input type="checkbox" class="me-1">Pasta
                                            </li>
                                            <li class="pb-3 d-flex">
                                                <label for=""></label>
                                                <input type="checkbox" class="me-1">Piadina
                                            </li>
                                            <li class="pb-3 d-flex">
                                                <label for=""></label>
                                                <input type="checkbox" class="me-1">Pokè
                                            </li>
                                            <li class="pb-3 d-flex">
                                                <label for=""></label>
                                                <input type="checkbox" class="me-1">Pollo
                                            </li>
                                            <li class="pb-3 d-flex">
                                                <label for=""></label>
                                                <input type="checkbox" class="me-1">Pizza
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="main-content">
                <h3 class="py-3">Ristoranti che consegnano a "Milano"</h3>
                <div class="grid">
                    <div class="card" v-for="restaurant in store.dataRT.restaurants">
                        <router-link :to="{ name: 'restaurants.show', params: { id: restaurant.id } }" class="reset">
                            <div>
                                <img src="https://www.welfarecare.org/wp-content/uploads/2021/10/Progetto-senza-titolo-56-1.jpg"
                                    alt="">
                            </div>

                            <div class="card-body" >
                                <h5>
                                    {{ restaurant.restaurant_name }}
                                </h5>
                                <p> 5.1 Valutazione</p>
                                <p>{{ restaurant.phone_number }}</p>
                                <span>{{ restaurant.restaurant_address }}</span> -
                                <span>Consegna gratuita</span>
                            </div>
                        </router-link>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>
</template>
  
<style lang="scss">
@import "../../../../style/partials/variables.scss";

.reset{
    text-decoration: none;
    color: currentColor;
}

.side-bar {
    display: flex;
    flex-direction: column;
    padding-top: 5px;
    width: 250px;
    margin-left: 0px;
    position: sticky;
}

.line-header {
    border-bottom: 1px solid lightgray;
    width: 100%;
    padding-bottom: 15px;
    content: '';
}

ul,
li {
    list-style: none;
}

.bottom-line {
    font-weight: 500;
    font-size: 13px;
    padding: 20px 0px 20px 0px;
    border-bottom: 1px solid lightgray;
}

.green {
    color: #01CCBC;
}

.accordion-button {
    background-color: $page-body-light !important;
    border-color: $page-body-light !important;
    box-shadow: none !important;
    padding: 5px 0px !important;
    font-size: 14px !important;

}

.accordion-collapse {
    margin-left: -50px !important;
}

input[type="radio"] {
    width: 18px;
    height: 18px;
    margin-right: 4px;
}

.search-input {
    margin-top: 15px;
    border-radius: 5px;
    width: 20%;
    height: 50px;
    color: lightgrey;
    background-color: rgb(239, 239, 239);
    border: 1px solid rgb(223, 223, 223);
    padding: 5px;
    z-index: 20;
}

.grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 300px));
    gap: 20px;
}

.main-content {
    flex-grow: 1;
    padding: 0px 40px 40px 40px;
}

.card {

    img {
        max-width: 100%;
    }

    .card-body {
        padding: 20px;
    }
}
</style>