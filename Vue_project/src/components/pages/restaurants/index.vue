<script>
import axios from 'axios';
import { store } from '../../../store';
export default {
  data() {
    return {
      store,
      BASE_URL: 'http://127.0.0.1:8000/api',
      selectedTypeIds: [], // Aggiungi un array per memorizzare gli ID dei tipi selezionati
      restaurants: [],
      types: [],
    };
  },
  methods: {
    fetchFilteredRestaurants() {
      let params = {}; // Inizializza un oggetto per i parametri della richiesta

      // Verifica se ci sono tipi selezionati
      if (this.selectedTypeIds.length > 0) {
        // Se ci sono tipi selezionati, aggiungi il parametro 'types'
        params.types = this.selectedTypeIds.join(',');
      }

      // Effettua la chiamata API
      axios
        .get(`${this.BASE_URL}/restaurants`, { params })
        .then((res) => {
          // Aggiorna solo l'array dei ristoranti
          this.store.dataRT.restaurants = res.data.results;
          this.restaurants = res.data.results.restaurants;
          this.types = res.data.results.types;
        })
        .catch((error) => {
          console.error('Errore durante il recupero dei ristoranti:', error);
        });
    },
    isChecked(typeId) {
      // Controlla se l'ID del tipo è presente nei tipi selezionati
      return this.selectedTypeIds.includes(typeId);
    },
    checked(typeId) {
      return typeId === parseInt(this.$route.params.id);
    },
    toggleFilter(typeId) {
      if (this.selectedTypeIds.includes(typeId)) {
        this.selectedTypeIds = this.selectedTypeIds.filter(
          (id) => id !== typeId
        );
      } else {
        this.selectedTypeIds.push(typeId);
      }
      this.fetchFilteredRestaurants();
    },
  },
  computed() {
    // Leggi i parametri dall'URL all'avvio del componente
    const urlParams = new URLSearchParams(window.location.search);
    const typeIds = urlParams.getAll('type_id[]');
    this.selectedTypeIds = typeIds.map((id) => parseInt(id));
    // Esegui la richiesta al backend per ottenere i ristoranti filtrati
    this.fetchFilteredRestaurants();
  },
  created() {
    if (parseInt(this.$route.params.id)) {
      this.selectedTypeIds.push(parseInt(this.$route.params.id));
    }
    this.fetchFilteredRestaurants();
  },
};
</script>

<template>
  <!-- side-bar -->

  <div class="container-fluid mt-100 ">
    <div class="d-flex ">
      
        <div class="side-bar d-none d-md-block">
          <ul>
            <li class="bottom-line">Milano</li>
            <!-- search bar  -->
            <li class="bottom-line">
              <input type="text" class="z-3 search-input" placeholder="Cerca Ristoranti" />
            </li>
            <li>
              <ul class="bottom-line">
                <li class="pb-3 fw-light d-flex">
                  <input type="radio" name="option1" id="consegna" />
                  <label for="consegna">Consegna</label>
                </li>
                <li class="fw-light d-flex">
                  <input type="radio" name="option1" id="Ritiro" />
                  <label for="Ritiro">Ritiro</label>
                </li>
              </ul>
            </li>
            <div class="accordion" id="accordionPanelsStayOpenExample">
              <div class="bottom-line">
                <h2 class="accordion-header">
                  <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false"
                    aria-controls="panelsStayOpen-collapseOne">
                    Categorie
                  </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                  <div class="accordion-body">
                    <ul class="fw-light">
                      <li v-for="type in types" :key="type.id" class="pb-3 d-flex">
                        <input :checked="(isChecked(type.id), checked(type.id))" @change="toggleFilter(type.id)"
                          :id="`type-${type.id}`" type="checkbox" class="me-1" />
                        <label class="input_label" :for="`type-${type.id}`">{{
                          type.name
                        }}</label>
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
                    Ordina
                  </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                  <div class="accordion-body">
                    <ul class="fw-light">
                      <li class="pb-3 d-flex">
                        <input type="radio" value="consegna" id="consegna" name="option2" />
                        <label for="consegna">Consegna più rapida</label>
                      </li>
                      <li class="pb-3 d-flex">
                        <input type="radio" id="consigliati" name="option2" value="consigliati" />
                        <label for="consigliati">Consigliati</label>
                      </li>
                      <li class="pb-3 d-flex">
                        <input type="radio" id="distanza" name="option2" value="distanza" />
                        <label for="distanza">Distanza</label>
                      </li>
                      <li class="pb-3 d-flex">
                        <input type="radio" name="option2" id="votati" value="votati" />
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
                        <input type="checkbox" class="me-1" id="accetta-contanti" value="accetta-contanti"
                          name="option3" />
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
                        <input type="checkbox" class="me-1" value="senza-glutine" name="option4" id="senza-glutine" />
                        <label for="">Senza Glutine</label>
                      </li>
                      <li class="pb-3 d-flex">
                        <input type="checkbox" class="me-1" name="option4" value="vegetariano" id="vegetariano" />
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
                        <input type="radio" name="option5" value="ticket-restaurant" id="ticket-restaurant" />
                        <label for="ticket-restaurant">Ticket Restaurant</label>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </ul>
        
        </div>
      <div class="main-content">
        <h3 class="py-3">Ristoranti che consegnano a "Milano"</h3>
        <div class="grid">
          <div class="card overflow-hidden" v-for="restaurant in restaurants" :key="restaurant.id">
            <router-link :to="{ name: 'restaurants.show', params: { id: restaurant.id } }" class="reset">
              <div class="card_content_image">
                <img v-if="restaurant.restaurant_image" class="img-fluid img-card" :src="`http://127.0.0.1:8000/storage/${restaurant.restaurant_image}`" alt="" />
                <img v-else class="img-fluid img-card" src="https://consumer-component-library.roocdn.com/27.1.19/static/images/placeholder.svg" alt="" />
                <div  class="image_badge">
                  <small v-for="type in restaurant.types" :key="type.id" class="card_badge">{{ type.name }}</small>
                </div>
              </div>
              <div class="card-body">
                <ul>
                  <li class="card_title">
                  {{ restaurant.restaurant_name }}
                  </li>
                  <li>{{ restaurant.phone_number }}</li>
                  <li>{{ restaurant.restaurant_address }}</li>
                </ul>
              </div>
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
@import '../../../../style/partials/variables.scss';
*{
  color: $text-gray !important;

}

.mt-100{
  margin-top: 100px;
}
.reset {
  text-decoration: none;
  color: currentColor;
}

.side-bar {
  display: flex;
  flex-direction: column;
  padding-top: 5px;
  width: 250px;
  margin-left: 0px;
  flex-shrink: 0;
}

.line-header {
  border-bottom: 1px solid lightgray;
  width: 100%;
  padding-bottom: 15px;
  height: 100px;
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
  color: #01ccbc;
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

input[type='radio'] {
  width: 18px;
  height: 18px;
  margin-right: 4px;
}

.search-input {
  border-radius: 5px;
  width: 100%;
  height: 50px;
  color: lightgrey;
  background-color: rgb(239, 239, 239);
  border: 1px solid rgb(223, 223, 223);
  padding: 5px;
}

.grid {
  display: grid;
  grid-template-columns: repeat(auto-fill,minmax(264px,1fr));
  gap: 20px;
}

.main-content {
  flex-grow: 1;
  padding: 0px 48px 40px 48px;
}

.card {
  border: none;
  box-shadow: 0 1px 4px #00000014, 0 0 0 1px #0000000a;
  .img-card{
    width: 100%;
    height: 150px;
    object-fit: cover;
  }
  img {
    max-width: 100%;
  }

  .card-body {
    padding: 8px 12px;
   ul{
    padding: 0;
    margin: 0;
   }

  }
  .card_title{
    font-size: 16px;
    font-weight: 700;
    text-transform: capitalize;
  }
}

.card_content_image{
  overflow: hidden;
  position: relative;
  .image_badge{
    display: flex;
    gap: 10px;
    position: absolute;
    z-index: 10;
    right: 10px;
    bottom: 10px;
  }
}

.card_content_image img:hover {
  transform: scale(1.05);
  transition: transform .15s ease-in-out; /* Utilizza ease-in-out per una transizione più fluida */
}

.card_content_image img {
  transition: transform .15s ease-in-out; /* Applica la stessa transizione quando il mouse esce dall'immagine */
}

.card_content_image img:hover {
  transform: scale(1.05);
}

.card_content_image img:not(:hover) {
  transform: scale(1); /* Quando il mouse non è sopra l'immagine, torna alla sua forma originaria */
}


.card_badge{
  background-color: $main-brand-color;
    border-radius: 999px;
    padding: 3px 6px;
    text-transform: capitalize;
    font-size: smaller;
    font-weight: bold;
    color: white !important;
    box-shadow: inset 3px 3px 10px -8.5px #ffffff;
    box-shadow: 0px 0 3px 0.5px rgba(221, 221, 221, 0.87);
}
.input_label {
  text-transform: capitalize;
}
// // Extra small devices (portrait phones, less than 576px)
// @media (max-width: 575.98px) {
//     .grid {
//         grid-template-columns: repeat(1, 1fr);
//         // grid-row-gap:10px;
//     }
// }

// // Small devices (landscape phones, 576px and up)
// @media (min-width: 576px) and (max-width: 767.98px) {
//     .grid {
//         grid-template-columns: repeat(2, 1fr);
//     }
// }

// // Medium devices (tablets, 768px and up)
// @media (min-width: 768px) and (max-width: 991.98px) {
//     .grid {
//         grid-template-columns: repeat(3, 1fr);
//     }
// }
// @media (min-width: 992px) and (max-width: 1499.98px) {
//     .grid {
//         grid-template-columns: repeat(4, 1fr);
//     }
// }
</style>
