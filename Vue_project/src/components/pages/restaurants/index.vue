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
    toggleFilterModal(typeId) {
      if (this.selectedTypeIds.includes(typeId)) {
        this.selectedTypeIds = this.selectedTypeIds.filter(
          (id) => id !== typeId
        );
      } else {
        this.selectedTypeIds.push(typeId);
      }
     
    },
    
    clearCheckbox(){
      // svuota l array nella modale 
      this.selectedTypeIds = [];
      // rifa la chiamata senza nessun filtro 
      this.fetchFilteredRestaurants();
    }
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
    if (this.$route.params.idArray) {
      this.$route.params.idArray.forEach(el => {
        if (parseInt(el)) {
          this.selectedTypeIds.push(parseInt(el));
        }
      });     
    }
    this.fetchFilteredRestaurants();     
  },
};
</script>

<template>
  <!-- modale  -->
  <!-- Modal -->
<form action="">

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Filtra</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <ul class="fw-light">
            <li v-for="(type) in types" :key="type.id" class="pb-3 d-flex">
              <input :checked="isChecked(type.id)" 
                :id="`type-${type.id}`" type="checkbox" class="me-1" @change="toggleFilterModal(type.id)"/>
              <label class="input_label" :for="`type-${type.id}`">{{
                type.name
              }}</label>
            </li>
            <!-- @change="toggleFilter(type.id)" -->
          </ul>
        </div>
        <div class="modal-footer_custom">
          <input  @click="clearCheckbox()"  type="reset" data-bs-dismiss="modal" class="btn btn-primary" value="Pulisci">
          <button  type="button" class="btn btn_done" @click="fetchFilteredRestaurants()"  data-bs-dismiss="modal">Fatto</button>
        </div>
      </div>
    </div>
  </div>

</form>

  <!-- side-bar -->
  <div class="bg-image">

  </div>
  <div class="container-fluid mt-100 ">
    <div class="d-flex ">

      <div class="side-bar d-none d-md-block">
        <ul class="p-0">
          <li class="bottom-line fs-4">Milano</li>
         
          <!-- search bar  -->
          <li class="bottom-line">
            <input type="text" class="z-3 search-input" placeholder="Cerca Ristoranti" />
          </li>
          <li>
            <ul class="bottom-line">
              <li class="pb-3 fw-light d-flex">
                <input type="radio" name="option1" id="consegna" />
                <label class="input_label" for="consegna">Consegna</label>
              </li>
              <li class="fw-light d-flex">
                <input type="radio" name="option1" id="Ritiro" />
                <label class="input_label" for="Ritiro">Ritiro</label>
              </li>
            </ul>
          </li>
          <li>
            <!-- Accordion Start -->

            <div class="accordion" id="accordionExample">
              <div class="bottom-line">
                <h2 class="accordion-header">
                  <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne" aria-expanded="true"
                    aria-controls="collapseOne">
                    Categorie
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show">
                  <div class="accordion-body">
                    <ul class="fw-light">
                      <li v-for="(type) in types" :key="type.id" class="pb-3 d-flex">
                        <input :checked="isChecked(type.id)" @change="toggleFilter(type.id)"
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
                    data-bs-target="#collapseTwo" aria-expanded="true"
                    aria-controls="collapseTwo">
                    Ordina
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse">
                  <div class="accordion-body">
                    <ul class="fw-light">
                      <li class="pb-3 d-flex">
                        <input type="radio" value="consegna" id="consegna" name="option2" />
                        <label class="input_label" for="consegna">Consegna più rapida</label>
                      </li>
                      <li class="pb-3 d-flex">
                        <input type="radio" id="consigliati" name="option2" value="consigliati" />
                        <label class="input_label" for="consigliati">Consigliati</label>
                      </li>
                      <li class="pb-3 d-flex">
                        <input type="radio" id="distanza" name="option2" value="distanza" />
                        <label class="input_label" for="distanza">Distanza</label>
                      </li>
                      <li class="pb-3 d-flex">
                        <input type="radio" name="option2" id="votati" value="votati" />
                        <label class="input_label" for="votati">I più votati</label>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
  
              <div class="bottom-line">
                <h2 class="accordion-header">
                  <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseThree" aria-expanded="true"
                    aria-controls="collapseThree">
                    Offerte
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse">
                  <div class="accordion-body">
                    <ul class="fw-light">
                      <li class="d-flex">
                        <input type="checkbox" class="me-1" id="accetta-contanti" value="accetta-contanti" name="option3" />
                        <label class="input_label" for="accetta-contanti">Accetta contanti</label>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
  
              <div class="bottom-line">
                <h2 class="accordion-header">
                  <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseFour" aria-expanded="true"
                    aria-controls="collapseFour">
                    Regime alimentari
                  </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse">
                  <div class="accordion-body">
                    <ul class="fw-light">
                      <li class="pb-3 d-flex">
                        <input type="checkbox" class="me-1" value="senza-glutine" name="option4" id="senza-glutine" />
                        <label class="input_label" for="">Senza Glutine</label>
                      </li>
                      <li class="pb-3 d-flex">
                        <input type="checkbox" class="me-1" name="option4" value="vegetariano" id="vegetariano" />
                        <label class="input_label" for="vegetariano">Vegetariano</label>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
  
              <div class="bottom-line">
                <h2 class="accordion-header">
                  <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseFive" aria-expanded="false"
                    aria-controls="collapseFive">
                    Buono pasto
                  </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse">
                  <div class="accordion-body">
                    <ul class="fw-light">
                      <li class="d-flex">
                        <input type="radio" name="option5" value="ticket-restaurant" id="ticket-restaurant" />
                        <label class="input_label" for="ticket-restaurant">Ticket Restaurant</label>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

          </li>
        </ul>

      </div>
      <div class="main-content">
          <h3 class="py-3 d-none d-md-block">Ristoranti che consegnano a "Milano"</h3>
          <!-- bottone modale  -->
          <div class="d-md-none d-flex my-3 gap-3">
            <input class="w-100 search-input" type="search" placeholder="Cerca Ristoranti">
            <button type="button" class="btn btn-light btn-modal-open" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <i class="fa-solid fa-sliders"></i>
            </button>

          </div>

        <div class="grid">
          <div class="card" v-for="restaurant in restaurants" :key="restaurant.id">
            <router-link :to="{ name: 'restaurants.show', params: { id: restaurant.id } }" class="reset">
              <span class="ribbon4"><i class="fa-solid fa-person-biking"></i>Gratis</span>
              <div class="card_content_image">

                <img v-if="restaurant.restaurant_image" class="img-fluid img-card"
                  :src="`http://127.0.0.1:8000/storage/${restaurant.restaurant_image}`" alt="" />
                <img v-else class="img-fluid img-card"
                  src="https://consumer-component-library.roocdn.com/27.1.19/static/images/placeholder.svg" alt="" />
                <div class="image_badge">

                  <small v-for="(type) in restaurant.types" :key="type.id" class="card_badge">{{ type.name }}</small>
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

.bg-image{
  width: 100%;
    height: 100%;
    background-image: url(../../../public/wave-haikei-3.svg);
    background-size: cover;
    background-repeat: no-repeat;
    top: 0;
    right: 0;
    position: absolute;
    z-index: -10;
}

* {
  color: $text-gray !important;
}

.mt-100 {
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
  background-color: transparent !important;
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
  grid-template-columns: repeat(auto-fill, minmax(264px, 1fr));
  gap: 20px;
}

.main-content {
  flex-grow: 1;
  padding: 0px 0px 40px 48px;
}

.card {
  position: relative;
  border: none;
  box-shadow: 0 1px 4px #00000014, 0 0 0 1px #0000000a;

  .img-card {
    border-top-right-radius: 0.375rem;
    border-top-left-radius: 0.375rem;
    width: 100%;
    height: 150px;
    object-fit: cover;
  }

  img {
    max-width: 100%;
  }

  .card-body {
    padding: 8px 12px;

    ul {
      padding: 0;
      margin: 0;
    }

  }

  .card_title {
    font-size: 16px;
    font-weight: 700;
    text-transform: capitalize;
  }
}

.card_content_image {
  overflow: hidden;
  position: relative;

  .image_badge {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    position: absolute;
    z-index: 10;
    right: 10px;
    bottom: 10px;
  }
}

.card_content_image img:hover {
  transform: scale(1.05);
  transition: transform .15s ease-in-out;
  /* Utilizza ease-in-out per una transizione più fluida */
}

.card_content_image img {
  transition: transform .15s ease-in-out;
  /* Applica la stessa transizione quando il mouse esce dall'immagine */
}

.card_content_image img:hover {
  transform: scale(1.05);
}

.card_content_image img:not(:hover) {
  transform: scale(1);
  /* Quando il mouse non è sopra l'immagine, torna alla sua forma originaria */
}


.card_badge {
  background: rgb(0, 58, 96);
  background: linear-gradient(90deg, rgba(0, 58, 96, 1) 0%, rgba(9, 71, 121, 1) 5%, rgba(1, 200, 245, 1) 90%, rgba(18, 230, 255, 0.9668242296918768) 100%);
  /* background-color: $main-brand-color; */
  border-radius: 999px;
  padding: 3px 6px;
  text-transform: capitalize;
  font-size: smaller;
  font-weight: bold;
  color: white !important;
  box-shadow: inset 3px 3px 10px -8.5px #ffffff;

}

// Badge Spedizione Gratutia

.ribbon4 {
  position: absolute;
  font-size: smaller;
  font-weight: bold;
  display: flex;
  gap: 3px;
  align-items: center;
  z-index: 10;
  top: 15px;
  padding: 3px 7px;
  background: #00B3ED;
  box-shadow: -1px 2px 3px rgba(0, 0, 0, .3);
}

.ribbon4:before,
.ribbon4:after {
  content: "";
  position: absolute;
}

.ribbon4:before {
  width: 7px;
  height: 100%;
  top: 0;
  left: -6.5px;
  padding: 0 0 32px;
  background: inherit;
  border-radius: 5px 0 0 5px;
}

.ribbon4:after {
  width: 5px;
  height: 5px;
  bottom: -5px;
  left: -4.5px;
  background: lightblue;
  border-radius: 5px 0 0 5px;
}

.input_label {
  text-transform: capitalize;
  font-size: 16px;
  font-weight: 500;
}
.btn_done{
  background-color: $main-brand-color;
  &:hover{
    background-color: #00c2b3;
  }
}
.modal-footer_custom{
  padding: 20px;
  display: grid;
  grid-template-columns: repeat(2,1fr);
  gap: 10px;
}
.btn-modal-open{
  color: $main-brand-color;
  border: 1px solid lightgray;
}
// Extra small devices (portrait phones, less than 576px)
@media (max-width: 575.98px) {
  .main-content {
    padding: 0px 0px 40px 0px;
  }
  .modal-footer_custom{
    grid-template-columns: repeat(1,1fr)
  }
}

// Small devices (landscape phones, 576px and up)
@media (min-width: 576px) and (max-width: 767.98px) {
  .main-content {
    padding: 0px 0px 40px 0px;
  }
}

// Medium devices (tablets, 768px and up)
@media (min-width: 768px) and (max-width: 991.98px) {}

@media (min-width: 992px) and (max-width: 1499.98px) {}
</style>
