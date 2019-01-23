<template>
    <div>
        <div class="card mb-20">
            <header class="card-header">
                <p class="card-header-title">Update Reader</p>
            </header>
            <div class="card-content">
                <div class="content">
                    <form id="updateForm">
                        <div class="field">
                            <div class="control">
                                <input class="input" type="text" placeholder="Reader ID" v-model="readerId">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <input class="input" type="text" placeholder="Username" v-model="username">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <input class="input" type="text" placeholder="Email" v-model="emailAddress">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <input class="input" type="text" placeholder="First Name" v-model="firstName">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <input class="input" type="text" placeholder="Last Name" v-model="lastName">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <input class="input" type="text" placeholder="password" v-model="password">
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
        data : function(){
            return {
                readerId : null,
                username : '',
                emailAddress : '',
                firstName : '',
                lastName : '',
                password : '',
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

                axios.put('/api/readers/' + self.readerId, {
                    publisherKey    : self.$store.state.credentials.key,
                    publisherSecret : self.$store.state.credentials.secret,
                    username        : self.username,
                    emailAddress    : self.emailAddress,
                    firstName       : self.firstName,
                    lastName        : self.lastName,
                    password        : self.password,
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