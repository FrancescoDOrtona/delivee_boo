import { createRouter, createWebHistory } from 'vue-router';
import Homepage from './components/pages/Homepage.vue';
import Restaurants from './components/pages/restaurants/index.vue';
import RestaurantShow from './components/pages/restaurants/show.vue';


const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/',
      name: 'home',
      component: Homepage,
    },
    {
      path: '/restaurants',
      name: 'restaurants.index',
      component: Restaurants,
    },
    {
      path: '/restaurants/:id',
      name: 'restaurants.show',
      props: true,
      component: RestaurantShow,
    }
  ],
});
export { router };
