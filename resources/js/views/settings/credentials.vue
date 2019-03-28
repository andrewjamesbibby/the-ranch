<template>
    <div>
        <div class="tabs single-use">
            <ul>
                <li><a>API Credentials</a></li>
            </ul>
        </div>

        <div class="card">
            <div class="card-content">
                <div class="field">
                    <div class="control">
                        <input class="input" type="text" placeholder="Pubisher Key" v-model="publisherKey">
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <input class="input" type="text" placeholder="Pubisher Secret" v-model="publisherSecret">
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-content has-text-right">
                <button class="button is-primary" @click="verifyCredentials" v-bind:class="{ 'is-loading': loading }">
                    <span> Verify Credentials </span>
                </button>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "credentials",
        computed : {
            publisherKey: {
                get : function(){
                    return this.$store.state.credentials.key;
                },
                set : function(value){
                    this.$store.commit('setKey', value);
                }
            },
            publisherSecret: {
                get : function(){
                    return this.$store.state.credentials.secret;
                },
                set : function(value){
                    this.$store.commit('setSecret', value);
                }
            },
        },
        mounted : function(){
            let publisherKey = localStorage.getItem('publisherKey');
            let publisherSecret = localStorage.getItem('publisherSecret');
            this.$store.commit('setKey', publisherKey);
            this.$store.commit('setSecret', publisherSecret);
        },
        methods : {
            verifyCredentials() {
                this.$store.commit('startLoading');

                axios.get('/api/verify')
                    .then((response) => {
                        if(response.data.verified){
                            this.toast('success', 'YEP - Those are some damn good credentials');
                        } else {
                            this.toast('error', 'NOPE - Those credentials are no good');
                        }
                    })
                    .catch((error) => {
                        if(error.response){
                            this.toast('error', error.response.data.message);
                        }
                    })
                    .then(() => {
                        this.$store.commit('stopLoading');
                    });
            }
        }
    }
</script>

<style scoped>
    .card p {
        margin-bottom: 0.5em;
    }
</style>