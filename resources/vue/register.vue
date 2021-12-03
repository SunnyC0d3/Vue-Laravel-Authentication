<template>
    <section>
        <div class="banner">
            <div class="container">
                <h1>Register Page</h1>
            </div>
        </div>
        <div class="container">
            <form method="POST" v-on:submit="checkFormSubmit" action="javascript:void(0);" novalidate="true">
                <h2>Sign Up</h2>
                <img v-show="loading" class="w-8 pb-8 mx-auto" src="/images/loading.svg" alt="loading-icon" />
                <flash :show-flash="showFlash" :authenticated="authenticated" :flash-message="flashMessage"></flash>
                <input type="text" placeholder="Firstname*" name="firstname" v-model="firstname" />
                <input type="text" placeholder="Lastname*" name="lastname" v-model="lastname" />
                <input type="email" placeholder="Email*" name="email" v-model="email" />
                <input type="password" placeholder="Password*" name="password" v-model="password" />
                <input type="password" placeholder="Re-enter Password*" name="password_confirmation" v-model="passwordConfirmation" />
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
            firstname: '',
            lastname: '',
            password: '',
            email: '',
            password: '',
            passwordConfirmation: '',
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
            if(this.firstname != '' && this.lastname != '' && this.password != '' && this.passwordConfirmation != '' && this.validEmail(this.email)) {
                if(this.password === this.passwordConfirmation) {
                    axios.post('/api/admin/register', {
                        firstname: this.firstname,
                        lastname: this.lastname,
                        email: this.email,
                        password: this.password,
                        password_confirmation: this.passwordConfirmation
                    })
                    .then((response) => {
                        this.enableFlash(false, true, 'Registration was successful');
                        setTimeout(() => {
                            window.location.href = '/login/';
                        }, 1000);
                    })
                    .catch((error) => {
                        this.enableFlash(false, false, error.response.data['error']);
                    });
                } else {
                    this.enableFlash(false, false, 'The password confirmation did not match!');
                }
            } else {
                this.enableFlash(false, false, 'One or more values was incorrect. Please try again!');
            }
        }
    }
};

</script>