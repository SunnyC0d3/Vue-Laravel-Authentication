<template>
    <p v-show="showFlash" :class="[authenticated ? 'success' : 'error']">{{ flashMessage }}</p>
</template>

<script>

export default {
    props: {
        showFlash: Boolean,
        authenticated: Boolean,
        flashMessage: String,
    },
};

</script>