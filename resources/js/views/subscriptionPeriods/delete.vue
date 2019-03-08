<template>
    <main-layout>
        <div class="tabs single-use">
            <ul>
                <li><a>Delete Subscription Period</a></li>
            </ul>
        </div>
        <form @submit.prevent="submit">
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Permission ID" v-model="id">
                </div>
            </div>
            <div class="field">
                <p class="control has-text-right">
                    <a @click="submit" class="button is-primary" v-bind:class="{ 'is-loading': loading }"> Submit </a>
                </p>
            </div>
        </form>
    </main-layout>
</template>
<script>
    export default {
        data : function(){
            return {
                id : null,
            }
        },
        methods : {
            submit: function () {
                this.$store.commit('startLoading');

                axios.delete('/api/subscription-periods/' + this.id )
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
        }
    }
</script>