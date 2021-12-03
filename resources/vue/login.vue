<template>
    <section>
        <div class="banner">
            <div class="container">
                <h1>Login Page</h1>
            </div>
        </div>
        <div class="container">
            <form method="POST" v-on:submit="checkFormSubmit" action="javascript:void(0);" novalidate="true">
                <h2>Sign In</h2>
                <img v-show="loading" class="w-8 pb-8 mx-auto" src="/images/loading.svg" alt="loading-icon" />
                <flash :show-flash="showFlash" :authenticated="authenticated" :flash-message="flashMessage"></flash>
                <input type="text" placeholder="Email*" name="email" v-model="email" />
                <input type="password" placeholder="Password*" name="password" v-model="password" />
                <input type="submit" value="Submit" />
                <input type="hidden" name="_token" :value="csrf">
            </form>
        </div>
    </section>
</template>

<script>
import flash from './components/flash.vue';
import axios from 'axios';

export default {
  computed: {},
    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            email: '',
            password: '',
            showFlash: false,
            authenticated: false,
            flashMessage: '',
            loading: false
        }
    },
    components: {
        flash
    },
    methods: {
        validEmail(email) {
            let reg = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return reg.test(email);
        },
        enableFlash(loading, authenticated, message) {
            this.showFlash = true;
            this.loading = loading;
            this.authenticated = authenticated;
            this.flashMessage = message;
        },
        checkFormSubmit(e) {
            e.preventDefault();
            this.loading = true;
            if(this.validEmail(this.email) && this.password != '') {
                axios.post('/api/admin/login', {
                    email: this.email,
                    password: this.password
                })
                .then((response) => {
                    this.enableFlash(false, true, 'Login was successful');
                    setTimeout(() => {
                        window.location.href = '/';
                    }, 1000);
                })
                .catch((error) => {
                    this.enableFlash(false, false, error.response.data['error']);
                });
            } else {
                this.enableFlash(false, false, 'One or more values was incorrect. Please try again!');
            }
        }
    }
};

</script>