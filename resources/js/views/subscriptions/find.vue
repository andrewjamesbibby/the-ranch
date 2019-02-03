<template>
    <main-layout>
        <div class="tabs single-use">
            <ul>
                <li><a>Find Subscription</a></li>
            </ul>
        </div>
        <form @submit.prevent="submit">
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Subscription ID" v-model="subscriptionId">
                </div>
            </div>
            <div class="field">
                <p class="control has-text-right">
                    <button type="submit" class="button is-primary" v-bind:class="{ 'is-loading': loading }"> Submit </button>
                </p>
            </div>
        </form>
    </main-layout>
</template>

<script>
    export default {
        data : function(){
            return {
                subscriptionId : null,
            }
        },
        methods : {
            submit: function() {
                this.$store.commit('startLoading');

                axios.get('/api/subscriptions/' + this.subscriptionId)
                .then((response) => {
                    this.$store.commit('setResponse' , response.data);
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
        },
    }
</script>