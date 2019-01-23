<template>
    <div>
        <div class="card mb-20">
            <header class="card-header">
                <p class="card-header-title">List Readers</p>
            </header>
            <div class="card-content">
                <div class="content">
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
                emailAddress : '',
                username : '',
                firstName : '',
                lastName : '',
                nodeId : '',
                subscription : '',
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