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
                <input class="input" type="text" placeholder="Filter By: Email Address" v-model="emailAddress">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <input class="input" type="text" placeholder="Filter By: Username" v-model="username">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <input class="input" type="text" placeholder="Filter By: First Name" v-model="firstName">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <input class="input" type="text" placeholder="Filter By: Last Name" v-model="lastName">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <input class="input" type="text" placeholder="Filter By: Node Id" v-model="nodeId">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <input class="input" type="text" placeholder="Filter By: Subscription" v-model="subscription">
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
                readerId     : null,
                emailAddress : '',
                username     : '',
                firstName    : '',
                lastName     : '',
                nodeId       : '',
                subscription : '',
            }
        },
        computed : {
            lastRequest : function() {
                return this.$store.state.lastRequest;
            },
        },
        methods : {
            submit: function() {
                var self = this;
                self.$store.commit('startLoading');

                axios.get('/api/readers', {
                    params : {
                        publisherKey    : self.$store.state.credentials.key,
                        publisherSecret : self.$store.state.credentials.secret,
                        emailAddress    : self.emailAddress,
                        username        : self.username,
                        firstName       : self.firstName,
                        lastName        : self.lastName,
                        nodeId          : self.nodeId,
                        subscription    : self.subscription,
                    }
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