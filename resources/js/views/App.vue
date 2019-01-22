<template>
    <div>
        <div class="loading-window" v-if="loading"></div>

        <nav class="navbar has-shadow">
            <div class="navbar-brand">
                <p class="navbar-item" href="/">
                    <img :src="'/images/neverland.gif'" height="28"> &nbsp;&nbsp; <strong> NEVERLAND </strong> | REST API PLAYGROUND
                </p>
                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>
        </nav>

        <div class="columns">

            <mainNav></mainNav>

            <div id ="builder" class="column is-3 is-fullheight">
                <router-view></router-view>
            </div>

            <div id="output" class="column is-7">

                <div class="request card mb-20">
                    <header class="card-header">
                        <p class="card-header-title">Raw</p>
                        <a href="#" class="card-header-icon" aria-label="copy">
                            <span class="icon">
                              <i class="far fa-copy" aria-hidden="true"></i>
                            </span>
                        </a>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            <pre>{{ lastRequest.raw }}</pre>
                        </div>
                    </div>
                </div>

                <div class="response card">
                    <header class="card-header">
                        <p class="card-header-title">
                            Response &nbsp;
                            <span class="tag is-default is-medium">{{ lastRequest.statusCode }}</span>
                        </p>
                        <a href="#" class="card-header-icon" aria-label="copy" @click="copyResponse">
                            <span class="icon">
                              <i class="far fa-copy" aria-hidden="true"></i>
                            </span>
                        </a>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            <pre>{{ lastRequest.body }}</pre>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</template>
<script>
    import mainNav from './layouts/mainNav';
    export default {
        components : {
            mainNav
        },
        data : function(){
            return {
            }
        },
        computed : {
            loading : function () {
                return this.$store.state.loading;
            },
            lastRequest : function() {
                return this.$store.state.lastRequest;
            },
        },
        methods : {
            copyResponse : function(){
                alert('ok');
            }
        }
    }
</script>