<template>
    <div>
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">List Readers</p>
            </header>
            <div class="card-content">
                <div class="content">
                    Find and display all publisher readers
                </div>
            </div>
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
            }
        },
        computed : {
            loading : function () {
                return this.$store.state.loading;
            },
        },
        methods : {
            submit: function () {
                var self = this;
                self.$store.commit('startLoading');

                axios.get('/api/readers')
                .then(function(response) {
                    self.$store.commit('setResponse' , response.data);
                })
                .catch(function(error) {
                    console.log(error);
                })
                .then(function() {
                    self.$store.commit('stopLoading');
                });
            }
        }
    }
</script>