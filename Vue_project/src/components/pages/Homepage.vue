<script>
import axios from 'axios';
import AppJumbo from '../AppJumbo.vue'
import JumboCarousel from '../CarouselJumbo.vue'

export default {
  components: {
    AppJumbo,
    JumboCarousel
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
        console.log(this.dataRT);
      });
    },
  },
  created() {
    this.fetchRestaurants();
  },
};
</script>
<template>
  <AppJumbo :dataRT="dataRT"/>
  <JumboCarousel/>
  
  <div class="container">
    <h1>Delivebo</h1>
  
    <div class="d-flex">
      <div>
        <ul>
          <h2>Types</h2>
          <li v-for="type in dataRT.types">
            {{ type.name }}
          </li>
        </ul>
      </div>
  
      <div>
        <ul>
          <h2>Restaurants</h2>
          <li v-for="restaurant in dataRT.restaurants">
            {{ restaurant.restaurant_name }}
          </li>
        </ul>
      </div>
    </div>

  </div>
</template>

<style lang="scss" scoped></style>
