<template>
    <div>
        <div class="card mb-20">
            <header class="card-header">
                <p class="card-header-title">Find Reader</p>
            </header>
            <div class="card-content">
                <div class="content">
                    <form>
                        <div class="field">
                            <div class="control">
                                <input class="input" type="text" placeholder="Reader ID" v-model="readerId">
                            </div>
                        </div>
                        <div class="field">
                            <p class="control">
                                <a @click="submit" class="button is-primary" v-bind:class="{ 'is-loading': loading }"> Submit </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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

                axios.get('/api/readers/' + self.readerId, {
                    params: {
                        publisherKey    : self.$store.state.credentials.key,
                        publisherSecret : self.$store.state.credentials.secret,
                    },
                })
                .then(function(response) {
                    self.$store.commit('setResponse' , response.data);
                })
                .catch(function(error) {
                    console.log('error');
                })
                .then(function() {
                    self.$store.commit('stopLoading');
                });
            }
        }
    }
</script>