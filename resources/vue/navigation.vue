 <template>
    <header>
        <nav>
            <a href="/">Products</a>
            <a v-show="!user" href="/login">Login</a>
            <a v-show="!user" href="/register">Register</a>
            <a v-show="user" href="#" @click="userLogout">Logout</a>
        </nav>
    </header>
</template>

<script>

export default {
    data() {
        return {

        }
    },
    mounted() {
        this.$store.dispatch('getUser');
    },
    computed: {
        user() {
            return this.$store.getters.user;
        }
    },
    methods: {
        userLogout() {
            this.$store.dispatch('userLogout');
        }
    },
};

</script>