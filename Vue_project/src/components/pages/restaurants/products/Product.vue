<script>
import axios from 'axios';

export default {
    data() {
        return {

        }
    },
}
</script>

<template>
    <!-- said-bar -->
    <div class="line-header d-flex justify-content-center align-items-center">
        <input type="search" class="">
    </div>
    <div class="said-bar">
        <ul>
            <li class=" bottom-line">Caserta</li>
            <ul class="bottom-line ">
                <li class="pb-3 fw-light d-flex">
                    <label for=""></label>
                    <input type="radio" >Consegna
                    
                </li>
                <li class="fw-light d-flex">
                    <label for=""></label>
                    <input type="radio">Ritiro
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
                                <li class="pb-3 d-flex ">
                                    <label for=""></label>
                                    <input type="radio">Consegna più rapida
                                </li>
                                <li class="pb-3 d-flex">
                                    <label for=""></label>
                                    <input type="radio">Consigni
                                </li>
                                <li class="pb-3 d-flex">
                                    <label for=""></label>
                                    <input type="radio" >Distanza
                                </li>
                                <li class="pb-3 d-flex">
                                    <label for=""></label>
                                    <input type="radio">I più votati
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
                                    <label for=""></label>
                                    <input type="checkbox" class="me-1"> Accetta contanti
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
                                    <label for=""></label>
                                    <input type="checkbox" class="me-1">Senza Glutine
                                </li>
                                <li class="pb-3 d-flex">
                                    <label for=""></label>
                                    <input type="checkbox" class="me-1">Vegetariano
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
                                    <label for=""></label>
                                    <input type="radio">Ticket Restaurant
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
</template>

<style lang="scss">
@import "../../../../../style/partials/variables";

.said-bar {
    display: flex;
    flex-direction: column;
    padding-top: 5px;
    width: 250px;
    margin-left: 50px;
}

.line-header{
    border-bottom: 1px solid lightgray;
    width: 100%;
    padding-bottom: 85px;
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
    background-color: white !important;
    border-color: white !important;
    box-shadow: none !important;
    padding: 5px 0px !important;
    font-size: 13px !important;

}

.accordion-collapse {
    margin-left: -50px !important;
}

input[type="radio"] {
    width: 18px;
    height: 18px;
    margin-right: 4px;
}
</style>