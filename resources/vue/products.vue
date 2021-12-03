<template>
  <section>
    <div class="banner">
      <div class="container">
        <h1>Products Page</h1>
      </div>
    </div>
    <div class="container">
      <h2 class="text-center pt-12">Latest Products</h2>
      <div v-show="user" class="latest-products">
        <div class="product" v-for="product in latestProducts" :key="product.id">
          <div class="image">
            <img :src="getProductImageUrl(product.id - 1)" :alt="'product_' + product.id"/>
          </div>
          <div class="content">
            <h3 class="product-name">{{ product.product_name }}</h3>
            <p class="price">£{{ product.product_price }}</p>
          </div>
        </div>
      </div>
      <div v-show="!user">
        <p class="text-center py-12">Need to be logged in to see the products!</p>
      </div>
    </div>
  </section>
</template>

<script>

export default {
  data() {
    return {
      
    }
  },
  mounted() {
    this.$store.dispatch('getProducts');
    this.$store.dispatch('getUser');
  },
  methods: {
    getProductImageUrl(index) {
      return this.$store.getters.products.images[index].product_image_url;
    },
  },
  computed: {
    latestProducts() {
      return this.$store.getters.products.data;
    },
    user() {
      return this.$store.getters.user;
    }
  },
};

</script>