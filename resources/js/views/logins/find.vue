<template>
    <main-layout>
        <div class="tabs single-use">
            <ul>
                <li><a>Find Reader Login</a></li>
            </ul>
        </div>
        <form @submit.prevent="submit">
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Reader Login ID" v-model="readerLoginId">
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
                readerLoginId : null,
            }
        },
        methods : {
            submit: function() {
                this.$store.commit('startLoading');

                axios.get('/api/reader-logins/' + this.readerLoginId)
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