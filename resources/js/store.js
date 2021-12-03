import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    user: false,
    products: '',
  },
  getters: {
    user: (state) => state.user,
    products: (state) => state.products,
  },
  mutations: {
    USER_LOGGED_IN(state, boolean) {
      state.user = boolean;
    },
    USER_LOGGED_OUT(state, boolean) {
      state.user = boolean;
    },
    PRODUCTS_DATA(state, data) {
      state.products = data;
    },
  },
  actions: {
    getUser({ commit }) {
      axios.get('/api/admin/user-profile')
        .then((response) => {
          commit('USER_LOGGED_IN', true);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    userLogout({ commit }) {
      axios.post('/api/admin/logout')
        .then((response) => {
          commit('USER_LOGGED_OUT', false);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getProducts({ commit }) {
      axios.get('/api/products/get-products')
        .then((response) => {
          const array = {
            images: response.data.products_images,
            data: response.data.products,
          };
          console.log(array);
          commit('PRODUCTS_DATA', array);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
});
