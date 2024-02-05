<script>
import axios from 'axios';
import { store } from '../../store';
import AppJumbo from './homepage/AppJumbo.vue';
import JumboCarousel from './homepage/CarouselJumbo.vue';
import HomepageTracking from './homepage/HomepageTracking.vue';
import HomepageSales from './homepage/HomepageSales.vue';
import HomepageCards from './homepage/HomepageCards.vue';

export default {
  components: {
    AppJumbo,
    JumboCarousel,
    HomepageTracking,
    HomepageSales,
    HomepageCards
  },
  data() {
    return {
      store,
      // dataRT: [],
      BASE_URL: 'http://127.0.0.1:8000/api',
    };
  },
  methods: {
    fetchRestaurants() {
      axios.get(`${this.BASE_URL}/restaurants`).then((res) => {
        // this.dataRT = res.data.results;
        // console.log(this.dataRT);

         this.store.dataRT = res.data.results;
        console.log(this.store.dataRT);

      });
    },
  },
  created() {
    this.fetchRestaurants();
  },
};
</script>
<template>
  <AppJumbo />
  <JumboCarousel/> 
  <HomepageTracking/>
  <HomepageSales/>
  <HomepageCards/>

</template>

<style lang="scss" scoped></style>
