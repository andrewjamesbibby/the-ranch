<template>
    <div>
        <div class="card mb-20">
            <header class="card-header">
                <p class="card-header-title">Create Reader</p>
            </header>
            <div class="card-content">
                <div class="content">
                    Create a new publisher reader
                </div>
            </div>
        </div>

        <form>
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
                    <input class="input" type="text" placeholder="Password" v-model="password">
                </div>
            </div>
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
        data : function(){
            return {
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

                axios.post('/api/readers', {
                    'username'     : self.username,
                    'emailAddress' : self.emailAddress,
                    'firstName'    : self.firstName,
                    'lastName'     : self.lastName,
                    'password'     : self.password,
                })
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