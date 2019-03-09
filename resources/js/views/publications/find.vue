<template>
    <div>
        <div class="tabs single-use">
            <ul>
                <li><a>Find Publication</a></li>
            </ul>
        </div>
        <form @submit.prevent="submit">
            <div class="field">
                <div class="control">
                    <input class="input" type="text" placeholder="Publication ID" v-model="publicationId">
                </div>
            </div>
            <div class="field">
                <p class="control has-text-right">
                    <button type="submit" class="button is-primary" v-bind:class="{ 'is-loading': loading }"> Submit </button>
                </p>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data : function(){
            return {
                publicationId : null,
            }
        },
        methods : {
            submit: function() {
                this.$store.commit('startLoading');

                axios.get('/api/publications/' + this.publicationId)
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