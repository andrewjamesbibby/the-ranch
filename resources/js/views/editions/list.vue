<template>
    <div>
        <div class="box">
            <strong>List Editions</strong>
            <p>Find and display all publisher Editions</p>
        </div>

        <form>
            <div class="field">
                <p class="control">
                    <a @click="submit" class="button is-primary" v-bind:class="{ 'is-loading': loading }"> Submit </a>
                </p>
            </div>
        </form>

    </div>
</template>

<script>
    export default {
        components: { },
        data : function(){
            return {
                readerId : null,
                loading : false,
            }
        },
        methods : {
            submit: function () {
                var self = this;

                self.loading = true;

                axios.get('/api/readers')
                .then(function(response) {
                    self.$store.commit('setResponse' , response.data);
                })
                .catch(function(error) {
                    console.log(error);
                })
                .then(function() {
                    self.loading = false;
                });
            }
        }
    }
</script>