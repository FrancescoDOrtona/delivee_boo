<template>
    <div class="types-section container">
        <div class="title">
            <h2>Le categorie più richieste</h2>
            <p>Seleziona la categoria che preferisci e scegli cosa prenotare tra una moltitudine di aziende partner.</p>
        </div>
        <div class="types-section_badges top-row">
            <div @click="addTypeId(type.id), toggleEffect(type.id)" v-for="type in store.dataRT.types" :key="type"
                class="badge" :class="{ 'active': isActive(type.id) }">
                <img class="badge-img" :src="type.img_url" alt="">
                <div class="badge-title">
                    <h5>{{ type.name }}</h5>
                </div>
            </div>

        </div>
        <div class="types-section_search">
            <router-link :to="{ name: 'restaurants.index', params: { idArray: selectedTypeIds } }">
                <button class="btn btn-light badge_button">Vai ai Risultati</button>
            </router-link>
        </div>
    </div>
</template>

<script>
import { store } from '../../../store';
export default {
    data() {
        return {
            store,
            selectedTypeIds: [],
            activeEffects: [],
        }
    }, methods: {
        addTypeId(typeId) {
            if (this.selectedTypeIds.includes(typeId)) {
                this.selectedTypeIds = this.selectedTypeIds.filter(
                    (id) => id !== typeId
                );
            } else {
                this.selectedTypeIds.push(typeId);
            }
        },
        toggleEffect(typeId) {
            const index = this.activeEffects.indexOf(typeId);
            if (index === -1) {
                // L'effetto non è attivo, lo attiviamo
                this.activeEffects.push(typeId);
            } else {
                // L'effetto è già attivo, lo disattiviamo
                this.activeEffects.splice(index, 1);
            }
        },
        isActive(typeId) {
            return this.activeEffects.includes(typeId);
        }
    },
}
</script>

<style lang="scss" scoped>
@use '../../../../style/partials/variables' as *;

.title {
    color: $text-gray !important;

    h2 {
        font-weight: bolder !important;
        font-size: 42px !important;
    }

    p {
        font-size: 18px;
        margin-bottom: 40px;
    }
}

.types-section {
    padding: 32px 64px;
}

.badge-img {
    //clip-path: polygon(20.7% 0%, 100% 0%, 79.3% 100%, 0% 100%); 
    border-radius: 47% 53% 54% 46% / 38% 36% 64% 62%;
    width: 120px;
    height: 80px;
    object-fit: cover;
    filter: drop-shadow(7px 5px 3px rgba(0, 0, 0, 0.555));
    cursor: pointer;
}

.active {
    transform: scale(1.07);

    .badge-title {
        background-color: rgba(255, 166, 0, 0.7);
    }
}

.inactive {
    transform: scale(1);
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
    transition: 0.5s ease-in-out;
}

.badge-title {
    position: absolute;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(1, 204, 188, 0.7);
    color: black;
    padding: 5px 10px;
    border-radius: 10px;
    cursor: pointer;

    h5 {
        margin: 0;
        font-weight: 600 !important;
        text-transform: capitalize;
    }
}

.badge:nth-child(odd):nth-child(-n+5) {
    grid-column: span 2;
}

.badge:nth-child(even):nth-child(n+7) {
    grid-column: span 2;
}

.types-section_search {
    padding: 20px 0px;
    margin-top: 15px;
    display: flex;
    justify-content: center;
}

.badge_button {
    background-color: $main-brand-color;
    font-weight: bold;
    padding: 15px 30px;

    &:hover {
        background-color: orange;
        transform: scale(1.05);

        &:after {
            content: " !";
        }
    }
}

// Extra small devices (portrait phones, less than 576px)
@media (max-width: 575.98px) {
    .badge:nth-child(odd):nth-child(-n+5) {
        grid-column: span 1;
    }

    .badge:nth-child(even):nth-child(n+7) {
        grid-column: span 1;
    }

}

// Small devices (landscape phones, 576px and up)
@media (min-width: 576px) and (max-width: 767.98px) {}

// Medium devices (tablets, 768px and up)
@media (min-width: 768px) and (max-width: 991.98px) {}

@media (min-width: 992px) and (max-width: 1499.98px) {}
</style>