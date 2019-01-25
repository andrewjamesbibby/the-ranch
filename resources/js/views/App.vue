<template>
    <div>
        <credentialsModal></credentialsModal>

        <div class="loading-window" v-if="loading"></div>

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
                        <a class="button is-light" @click="openCredentialsModal">
                            <span><i class="fa fa-cog"></i> Settings </span>
                        </a>
                    </div>
                </div>
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
                            <span v-if="lastRequest.statusCode" v-html="statusCodeTag"></span>
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
    import CredentialsModal from "../components/credentialsModal";
    export default {
        components : {
            CredentialsModal,
            mainNav
        },
        computed : {
            loading : function () {
                return this.$store.state.loading;
            },
            lastRequest : function() {
                return this.$store.state.lastRequest;
            },
            statusCodeTag : function(){
                if(_.includes([ 200, 201, 200 ], this.lastRequest.statusCode)){
                    return `<span class="tag is-success is-medium">${ this.lastRequest.statusCode }</span>`;
                }
                if(_.includes([ 400, 401, 403, 404, 405, 429, 500 ], this.lastRequest.statusCode)){
                    return `<span class="tag is-danger is-medium">${ this.lastRequest.statusCode }</span>`;
                }
                return `<span class="tag is-danger is-default">${ this.lastRequest.statusCode }</span>`;
            },
        },
        methods : {
            copyResponse : function(){
                alert('ok');
            },
            openCredentialsModal: function() {
                this.$store.commit('toggleCredentialsModal', true);
            },
            getClass : function(){
                return 'ok';
            }
        }
    }
</script>