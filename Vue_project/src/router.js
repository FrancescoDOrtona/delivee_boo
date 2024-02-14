import { createRouter, createWebHistory } from 'vue-router';
import Homepage from './components/pages/Homepage.vue';
import Restaurants from './components/pages/restaurants/index.vue';
import RestaurantShow from './components/pages/restaurants/show.vue';
import Payment from './components/pages/Payment.vue';
import Checkout from './components/pages/Checkout.vue';

const router = createRouter({
  scrollBehavior(to, from, savedPosition) {
    // always scroll to top
    return { top: 0 };
  },
  history: createWebHistory(),
  routes: [
    {
      path: '/',
      name: 'home',
      component: Homepage,
    },
    {
      path: '/payment/',
      name: 'payment',
      component: Payment,
    },
    {
      path: '/restaurants/',
      name: 'restaurants.index',
      component: Restaurants,
    },
    {
      path: '/restaurants/:id',
      name: 'restaurants.show',
      props: true,
      component: RestaurantShow,
    },
    {
      path: '/checkout',
      name: 'checkout',
      props: true,
      component: Checkout,
    },
  ],
});
export { router };
