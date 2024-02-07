<template>
    <div class="types-section container">
        <div class="title">
            <h2>Le categorie più richieste</h2>
            <p>Seleziona la categoria che preferisci e scegli cosa prenotare tra una moltitudine di aziende partner.</p>
        </div>
        <div class="types-section_badges top-row">
            <div v-for="type in store.dataRT.types" :key="type"  class="badge">
                <router-link :to="{ name: 'restaurants.index' , params: { id: type.id} }">
                    <img  class="badge-img" :src="type.img_url" alt="">
                    <div class="badge-title">
                        <h5>{{ type.name }}</h5>
                    </div>                    
                </router-link>
            </div>
        </div>           
    </div>
</template>

<script>
import { store } from '../../../store';
    export default {
        data() {
            return {
                store,
            }
        }
    }
</script>

<style lang="scss" scoped>
@use '../../../../style/partials/variables' as *;

.title{
    color: $text-gray !important;
    h2{
        font-weight: bolder !important;
        font-size: 42px !important;
    }
    p{
        font-size: 18px;
        margin-bottom: 40px;
    }
}

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
    color: black;
    padding: 5px 10px;
    border-radius: 10px;
    h5{
        margin: 0;
        font-weight: 600 !important;
        text-transform: capitalize;
    }
}

.badge:nth-child(odd):nth-child(-n+5){
    grid-column: span 2;
}
.badge:nth-child(even):nth-child(n+7){
    grid-column: span 2;
}


</style>