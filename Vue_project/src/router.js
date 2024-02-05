import { createRouter, createWebHistory } from 'vue-router';
import Homepage from './components/pages/Homepage.vue';
import Product from './components/pages/restaurants/products/Product.vue';


const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/',
      name: 'home',
      component: Homepage,
    },
    {
      path: '/menu',
      name: 'menu',
      component: Product,
    }
  ],
});
export { router };
