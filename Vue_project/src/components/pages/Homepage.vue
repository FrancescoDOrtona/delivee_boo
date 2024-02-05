<script>
import axios from 'axios';
import AppJumbo from './homepage/AppJumbo.vue';
import JumboCarousel from './homepage/CarouselJumbo.vue';
import HomepageTracking from './homepage/HomepageTracking.vue';

export default {
  components: {
    AppJumbo,
    JumboCarousel,
    HomepageTracking
  },
  data() {
    return {
      dataRT: [],
      BASE_URL: 'http://127.0.0.1:8000/api',
    };
  },
  methods: {
    fetchRestaurants() {
      axios.get(`${this.BASE_URL}/restaurants`).then((res) => {
        this.dataRT = res.data.results;
        // console.log(this.restaurants);
      });
    },
  },
  created() {
    this.fetchRestaurants();
  },
};
</script>
<template>
  <AppJumbo/>
  <JumboCarousel/>
  <HomepageTracking/>

</template>

<style lang="scss" scoped></style>
