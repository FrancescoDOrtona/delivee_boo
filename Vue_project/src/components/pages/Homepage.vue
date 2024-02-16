<script>
import axios from 'axios';
import { store } from '../../store';
import AppJumbo from './homepage/AppJumbo.vue';
import JumboCarousel from './homepage/CarouselJumbo.vue';
import HomepageTracking from './homepage/HomepageTracking.vue';
import HomepageSales from './homepage/HomepageSales.vue';
import HomepageCards from './homepage/HomepageCards.vue';
import HomepageTypes from './homepage/HomepageTypes.vue';

export default {
  components: {
    AppJumbo,
    JumboCarousel,
    HomepageTypes,
    HomepageTracking,
    HomepageSales,
    HomepageCards
  },
  data() {
    return {
      store,
      isLoading: true,
      BASE_URL: 'http://127.0.0.1:8000/api',
      successMessage: ''
    };
  },
  methods: {
    fetchRestaurants() {
      axios.get(`${this.BASE_URL}/restaurants`).then((res) => {
        // this.dataRT = res.data.results;
        // console.log(this.dataRT);

         this.store.dataRT = res.data.results;
        // console.log(this.store.dataRT);

      });
    },
  },
  created() {
    this.fetchRestaurants();
  },mounted() {
    // Simula il caricamento della pagina con un ritardo di 2 secondi
    setTimeout(() => {
      // Dopo il ritardo, imposta isLoading su false per nascondere il loader
      this.isLoading = false;
    }, 2000);
    
  },
};
</script>
<template>
  
  <!-- Mostra il loader se isLoading è true -->
  <div v-if="isLoading" class="loading">
    <span class="loader"></span>
    <p>Caricamento . . .</p>
  </div>
  <div v-else>
    <AppJumbo />
    <JumboCarousel/>
    <HomepageTypes/> 
    <HomepageTracking/>
    <HomepageSales/>
    <HomepageCards/>    
  </div>

</template>

<style lang="scss" scoped>
.loading{
  display: flex;
  flex-direction: column;
  align-items: center;
  position: relative;
  top: 50%;
  transform: scale(2);

}
.loader {
  width: 48px;
  height: 48px;
  border-radius: 50%;
  display: inline-block;
  position: relative;
  border: 3px solid;
  border-color: #dddd #dddd transparent transparent;
  box-sizing: border-box;
  animation: rotation 1s linear infinite;
}
.loader::after,
.loader::before {
  content: '';  
  box-sizing: border-box;
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  margin: auto;
  border: 3px solid;
  border-color: transparent transparent #01ccbc #01ccbc;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  box-sizing: border-box;
  animation: rotationBack 0.5s linear infinite;
  transform-origin: center center;
}
.loader::before {
  width: 32px;
  height: 32px;
  border-color: #dddd #dddd transparent transparent;
  animation: rotation 1.5s linear infinite;
}
    
@keyframes rotation {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
} 
@keyframes rotationBack {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(-360deg);
  }
}
    
</style>
