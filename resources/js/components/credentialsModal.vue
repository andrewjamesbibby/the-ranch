<template>
    <div class="modal" v-bind:class="{ 'is-active' : publisherModal }">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">API Credentials</p>
                <button class="delete" aria-label="close" @click="closeModal"></button>
            </header>
            <section class="modal-card-body">
                <form>
                    <div class="field">
                        <div class="control">
                            <input class="input" type="text" placeholder="Publisher Key" v-model="publisherKey">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input class="input" type="text" placeholder="Pubisher Secret" v-model="publisherSecret">
                        </div>
                    </div>
                </form>
            </section>
            <footer class="modal-card-foot">
            </footer>
        </div>
    </div>
</template>

<script>
    export default {
        computed : {
            publisherModal: {
                get : function(){
                    return this.$store.state.credentials.modal;
                },
                set : function(value){
                    this.$store.commit('toggleCredentialsModal', value);
                }
            },
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
        methods : {
            closeModal : function() {
                this.$store.commit('toggleCredentialsModal', false);
            }
        }
    }
</script>
