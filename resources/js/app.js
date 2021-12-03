import Vue from 'vue';
import store from './store';

import Navigation from '../vue/navigation.vue';
import Products from '../vue/products.vue';
import Login from '../vue/login.vue';
import Register from '../vue/register.vue';

const app = new Vue({
  el: '#app',
  components: {
    navigation: Navigation,
    products: Products,
    login: Login,
    register: Register,
  },
  store,
});
