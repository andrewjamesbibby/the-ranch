<template>
    <nav class="navbar has-shadow">
        <div class="navbar-brand">
            <p class="navbar-item" href="/">
                <img :src="'/images/neverland.gif'" height="28"> &nbsp;&nbsp; <strong> NEVERLAND </strong> | YUDU REST API PLAYGROUND
            </p>
            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <router-link class="button is-light" to="/history">
                        <span><i class="fa fa-history"></i> History </span>
                    </router-link>
                    <a class="button is-light" @click="openCredentialsModal">
                        <span><i class="fa fa-cog"></i> Settings </span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        methods : {
            openCredentialsModal: function() {
                this.$store.commit('toggleCredentialsModal', true);
            },
        }
    }
</script>
