<template>
    <main-layout>
        <div class="tabs">
            <ul>
                <li class="is-active"><a>List Readers</a></li>
            </ul>
        </div>
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
    </main-layout>
</template>

<script>
    export default {
        data : function(){
            return {
                readerId : null,
            }
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
                    if(error.response){
                        alert(error.response.data.message)
                    }
                })
                .then(function() {
                    self.$store.commit('stopLoading');
                });
            }
        }
    }
</script>