<script>
import axios from 'axios';
import AppJumbo from '../AppJumbo.vue';
import JumboCarousel from '../CarouselJumbo.vue';
import { store } from '../../store';

export default {
  components: {
    AppJumbo,
    JumboCarousel
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
  
</template>

<style lang="scss" scoped></style>
