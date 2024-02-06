<script>
import axios from 'axios';
import { store } from '../../../store';
</script>

<template>
    <div class="container-fluid justify-content-between">
        <div class="row">
            <div class="pt-4">
                <p class="green"><i class="fa-solid fa-arrow-left"></i> Indietro</p>
            </div>
            <div class="col-9 d-flex ">
                <div class="">
                    <img src="https://blog.giallozafferano.it/trasentieriefornelli/wp-content/uploads/2022/03/IMG_0015-960x640.jpg"
                        alt="">
                </div>
                <div class="px-4">
                    <h2 class="fw-bold">Poke House</h2>
                    <div class="pt-2">
                        ‪15 - 25‬ min· Poke·Sushi
                    </div>
                    <div class="pt-3">
                        Distanza: 1.18 km · Chiude alle 22:30 · Minimo d'ordine: 10,00 € · Consegna gratuita
                    </div>
                </div>
            </div>
            <div class="col-3 ">
                <div class="d-flex justify-content-end">
                    <p class="px-3">
                        Consegna in 15 - 30 min
                    </p>
                    <p class="green">
                        Cambia
                    </p>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-dark">Avvia ordine di gruppo</button>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-fluid p-2">
        <div class="row">
            <div class="col-12">
                <ul class="d-flex gap-4">
                    <li class="green">crea la tua bowls</li>
                    <li class="green">Avocado Toast</li>
                    <li class="green">Sweet Treats</li>
                    <li class="green">Cold Pressed & Smoothies</li>
                    <li class="green">Bevande</li>
                </ul>
            </div>
        </div>
    </div>
    <hr class="hr-shadow">
</template>

<style lang="scss">
@import "../../../../style/partials/variables.scss";

.col-9 {
    display: flex;
    justify-content: start;
}

.container-fluid {
    padding: 50px 0 !important;
    max-width: 1980px !important;
}

img {
    max-width: 600px;
    border-radius: 5px;
}

.hr-shadow {
    box-shadow: 2px 4px 10px 2px #767676;
}

.green {
    color: $main-brand-color;
}
</style>